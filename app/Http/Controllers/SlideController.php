<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\SlideTranslation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('components.slides', [
            'slides' => $slides
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
        return view('components.addSlide', [
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

        $slide = new Slide;
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['description']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->description = $data[$key . '_']['description'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый слайдер успешно создан');

        return redirect('slides');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {

        return view('components.editSlide', [
            'slide' => $slide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
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

        $slide = Slide::findOrFail($slide->id);
        $slide->image = $name;


        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['description']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->description = $data[$key . '_']['description'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Слайд успешно изменен');

        return redirect('slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        Alert::info('Успешно', 'Слайдер удален');

        return redirect('slides');
    }
}
