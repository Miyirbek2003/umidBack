<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::all();
        return view('components.Feedback.Feedback', [
            'slides' => $feedback
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
        return view('components.Feedback.addFeedback', [
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

        ]);

        $languages = config('translatable.languages');

        $file = $request->file('image');
        $name = time() . rand(1, 50) . '.' . $file->extension();
        $file->move(public_path('images'), $name);
        $input['image'] = "$name";

        $slide = new Feedback;
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['description']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->description = $data[$key . '_']['description'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый отзыв успешно создан');

        return redirect('feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('components.Feedback.editFeedback', [
            'slide' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
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

        $slide = Feedback::findOrFail($feedback->id);
        $slide->image = $name;

        foreach ($languages as $key => $value) {
            if ($data[$key . '_']['title'] && $data[$key . '_']['description']) {
                $slide->translateOrNew($key)->title = $data[$key . '_']['title'];
                $slide->translateOrNew($key)->description = $data[$key . '_']['description'];
            }
        }
        $slide->save();
        Alert::success('Успешно', 'Новый отзыв успешно изменен');

        return redirect('feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        Alert::info('Успешно', 'Отзыа удален');

        return redirect('feedback');
    }
}
