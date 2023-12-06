<?php

namespace App\Http\Controllers;

use App\Models\Treatments;
use App\Models\TypeTreatments;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class TypeTreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $typeTreat = TypeTreatments::all();

        return view('components.typeTreat', [
            'slides' => $typeTreat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeTreat = TypeTreatments::all();
        $treatment = Treatments::all();
        return view('components.addTypeTreat', [
            'slides' => $typeTreat,
            'treatment' => $treatment
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

            'treatment_id' => 'required',

        ]);

        $languages = config('translatable.languages');


        $slide = new TypeTreatments;
        $slide->treatment_id = $request->treatment_id;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['body']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->body = $data[$key . '_']['body'];
                $slide->translateOrNew($key)->slug =  Str::slug($data[$key . '_']['title'], '-') . '-' . time();;
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый слайдер успешно создан');

        return redirect('typetreatments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeTreatments  $typeTreatments
     * @return \Illuminate\Http\Response
     */
    public function show(TypeTreatments $typeTreatments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeTreatments  $typeTreatment
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeTreatments $typeTreatment, $id)
    {

        $treatment = Treatments::all();

        return view('components.editTypeTreat', [
            'slide' => $typeTreatment::findOrFail($id),
            'treatment' => $treatment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeTreatments  $typeTreatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeTreatments $typeTreatment, $id)
    {
        $data = $request->validate([
            'ru_.*' => 'required',
            'uz_.*' => 'required',

            'treatment_id' => 'required',
        ]);


        $languages = config('translatable.languages');



        $slide =  TypeTreatments::findorFail($id);

        $slide->treatment_id = $request->treatment_id;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['body']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->body = $data[$key . '_']['body'];
                $slide->translateOrNew($key)->slug =  Str::slug($data[$key . '_']['title'], '-') . '-' . time();;
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый слайдер успешно создан');

        return redirect('typetreatments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeTreatments  $typeTreatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeTreatments $typeTreatment, $id)
    {

        $typeTreatment::findOrFail($id)->delete();
        Alert::info('Успешно', 'Тип удален');

        return redirect('typetreatments');
    }
}
