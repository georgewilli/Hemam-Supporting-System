<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminQuizzesController extends Controller
{

 /*
    |--------------------------------------------------------------------------
    | Admin Quizzes Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for controlling all the Quizzes by the admin
    | to be able to add, modify, delete any course.
    |   
    |
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();

        return view('Admin.quizzes.index', [
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        return view('Admin.quizzes.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:quizzes',
        ]);
        // $imageName = str_replace(' ', '_', $request->name);
        // $newImageName= $imageName . $request->course_id . '.'  . $request->image_path->extension();

        $quizz = Quiz::create([
            'name' => $request->input('name'),
            'course_id' => $request->course_id,
        ]);

        return redirect('/admin/quizzes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::where('quiz_id', $id)->get();

        // show the view and pass the shark to it
        return view('Admin.quizzes.show', ['questions' => $questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        $courses = Course::all();

        return view('Admin.quizzes.edit',
            ['quiz' => $quiz,
                'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:quizzes',
        ]);

        $quizz = Quiz::where('id', $id)->update([
            'name' => $request->input('name'),
            'course_id' => $request->course_id,
        ]);

        return redirect('/admin/quizzes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();

        return redirect('/admin/quizzes');
    }
}
