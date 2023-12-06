<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('components.employees', [
            'slides' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = config('translatable.languages');
        return view('components.addEmp', [
            'languages' => $language
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'ru_.*' => 'required',
            'uz_.*' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $languages = config('translatable.languages');

        $file = $request->file('image');
        $name = time() . rand(1, 50) . '.' . $file->extension();
        $file->move(public_path('images'), $name);
        $input['image'] = "$name";

        $slide = new Employee;
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['name'] && $data[$key . '_']['job']) {
                $slide->translateOrNew($key)->name = $data[$key . '_']['name'];
                $slide->translateOrNew($key)->job = $data[$key . '_']['job'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый сотрудник успешно создан');

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('components.editEmp', [
            'slide' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'ru_.*' => 'required',
            'uz_.*' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $languages = config('translatable.languages');

        $file = $request->file('image');
        $name = time() . rand(1, 50) . '.' . $file->extension();
        $file->move(public_path('images'), $name);
        $input['image'] = "$name";

        $slide = Employee::findOrFail($employee->id);
        $slide->image = $name;


        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['name'] && $data[$key . '_']['job']) {
                $slide->translateOrNew($key)->name = $data[$key . '_']['name'];
                $slide->translateOrNew($key)->job = $data[$key . '_']['job'];
            }
        }
        $slide->save();
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        Alert::info('Успешно', 'Сотрудник удален');

        return redirect('employees');
    }
}
