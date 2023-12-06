<?php

namespace App\Http\Controllers;

use App\Models\ImageSlide;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ImageSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = ImageSlide::all();
        return view('components.ImageSlide.imageslide', [
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
        return view('components.ImageSlide.addimageslide', [
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
            'image-do' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image-posle' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $languages = config('translatable.languages');

        $file1 = $request->file('image-do');
        $name1 = time() . rand(1, 50) . '.' . $file1->extension();
        $file1->move(public_path('images'), $name1);
        $input['image'] = "$name1";

        $file2 = $request->file('image-posle');
        $name2 = time() . rand(1, 50) . '.' . $file2->extension();
        $file2->move(public_path('images'), $name2);
        $input['image'] = "$name2";





        $slide = new ImageSlide;
        $slide->do = $name1;
        $slide->posle = $name2;

        $slide->save();
        Alert::success('Успешно', 'Новый фото успешно создан');

        return redirect('imageslide');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function show(ImageSlide $imageSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageSlide $imageSlide, $id)
    {

        $imageSlide  = ImageSlide::findOrFail($id);
        return view('components.ImageSlide.editimageslide', [
            'slide' => $imageSlide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageSlide $imageSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageSlide $imageSlide, $id)
    {
        $slide = ImageSlide::findOrFail($id);
        $slide->delete();
        Alert::info('Успешно', 'Фото удален');

        return redirect('imageslide');
    }
}
