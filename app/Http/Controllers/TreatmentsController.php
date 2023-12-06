<?php

namespace App\Http\Controllers;

use App\Models\Treatments;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatments = Treatments::all();
        return view('components.treatments', [
            'slides' => $treatments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treatment = Treatments::all();
        return view('components.addTreat');
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

        $slide = new Treatments;
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый категория успешно создан');

        return redirect('treatments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatments  $treatments
     * @return \Illuminate\Http\Response
     */
    public function show(Treatments $treatments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatments  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatments $treatment)
    {

        return view('components.editTreat', [
            'slide' => $treatment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatments  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatments $treatment)
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

        $slide = Treatments::findOrFail($treatment->id);
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Категория успешно изменен');

        return redirect('treatments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatments  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatments $treatment)
    {

        $treatment->delete();
        Alert::info('Успешно', 'Слайдер удален');

        return redirect('treatments');
    }
}
