<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\FinishedCourses;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class quizController extends Controller
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
        return view('pages.quiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::id();
        $userFinsih = DB::table('finished_courses')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();
        $userCourse = DB::table('course_user')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();
        if (count($userCourse) == 0) {
            $error = 'you need to buy this course first to get access to its content';
            $courses = Course::all();

            return view('pages.courses', [
                'courses' => $courses,
                'error' => $error,
            ]);
        } elseif (count($userFinsih) == 1) {
            $course = Course::where('id', $id)->first();
            $message = 'Congratulations! you already passed this course';

            return view('pages.courseShow', ['message' => $message, 'course' => $course]);
        } else {
            $quiz = Quiz::where('course_id', $id)->first();

            return view('pages.quiz', [
                'quiz' => $quiz]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $answer, $id)
    {

        $quiz = Quiz::where('id', $id)->first();
        $courseId = $quiz->course_id;
        $questions = $quiz->quizzesQuestions;
        $c = count($questions);
        $pass = $c * 0.7;
        $points = 0;
        $userId = Auth::id();

        for ($i = 0; $i < $c; $i++) {
            $b = $i + 1;

            $answer->validate([
                'question_' . $b => 'required',
            ]);

            if ($questions[$i]->answer == $answer->input('question_' . $b)) {
                $points++;
            }
        }
        if ($points >= $pass) {
            $FinishedCourses = FinishedCourses::create([
                'user_id' => $userId,
                'course_id' => $courseId,
            ]);
            $pass = 'You are succesfully pass the exam';

            return view('pages.PassOrFail', ['pass' => $pass, 'courseId' => $courseId]);
        } else {
            $fail = 'You did not pass the exam';

            return view('pages.PassOrFail', ['fail' => $fail]);
        }

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
    public function submit($id)
    {
        //
    }
}
