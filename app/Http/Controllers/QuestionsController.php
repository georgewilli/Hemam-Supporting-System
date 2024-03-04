<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $questions = Question::all();

        return view('Admin.questions.index', [
            'questions' => $questions,

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
        $quizzes = Quiz::all();

        return view('Admin.questions.create', ['courses' => $courses, 'quizzes' => $quizzes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_head' => 'required|string',
            'first_option' => 'required|string',
            'second_option' => 'required|string',
            'third_option' => 'required|string',
            'fourth_option' => 'required|string',
            'course_id' => 'required|integer',
            'quiz_id' => 'required|integer',
            'answer' => 'required|integer',
        ]);

        $question = Question::create([
            'course_id' => $request->course_id,
            'quiz_id' => $request->quiz_id,
            'question_head' => $request->input('question_head'),
            'first_option' => $request->input('first_option'),
            'second_option' => $request->input('second_option'),
            'third_option' => $request->input('third_option'),
            'fourth_option' => $request->input('fourth_option'),
            'answer' => $request->input('answer'),
        ]);

        return redirect('/admin/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id)->first();

        // show the view and pass the shark to it
        return view('Admin.questions.show', ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $courses = Course::all();
        $quizzes = Quiz::all();

        return view('Admin.questions.edit',
            ['question' => $question,
                'courses' => $courses, 'quizzes' => $quizzes]);
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
            'question_head' => 'required|string',
            'first_option' => 'required|string',
            'second_option' => 'required|string',
            'third_option' => 'required|string',
            'fourth_option' => 'required|string',
            'course_id' => 'required|integer',
            'quiz_id' => 'required|integer',
            'answer' => 'required|integer',
        ]);

        $question = Question::where('id', $id)->update([
            'course_id' => $request->course_id,
            'quiz_id' => $request->quiz_id,
            'question_head' => $request->input('question_head'),
            'first_option' => $request->input('first_option'),
            'second_option' => $request->input('second_option'),
            'third_option' => $request->input('third_option'),
            'fourth_option' => $request->input('fourth_option'),
            'answer' => $request->input('answer'),
        ]);

        return redirect('/admin/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
