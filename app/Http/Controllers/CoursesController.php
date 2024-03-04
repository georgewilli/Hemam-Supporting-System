<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::all();

        return view('pages.courses', [
            'courses' => $courses,
        ]);
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
        $finished = DB::table('finished_courses')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();
        $userCourse = DB::table('course_user')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();
        if (count($userCourse) < 1) {
            $error = 'you need to buy this course first to get access to its content';
            $courses = Course::all();

            return view('pages.courses', [
                'courses' => $courses,
                'error' => $error,
            ]);

        } elseif (count($finished) > 0) {

            $course = Course::find($id);

            return view('pages.courseShow', [
                'course' => $course,
                'finished' => $finished]);
        } else {
            $course = Course::find($id);

            return view('pages.courseShow', [
                'course' => $course]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function showVideo($video_path)
    {
        return view('pages.videoShow', ['video_path' => $video_path]);
    }

    public function buying($id)
    {
        $userId = Auth::id();

        $course = CourseUser::create([
            'user_id' => $userId,
            'course_id' => $id,
        ]);

        return $this->show($id);
    }

    public function submit($stripe_id)
    {

        $userId = Auth::id();
        $course = Course::where('stripe_id', $stripe_id)->first();
        $id = $course->id;

        $user = DB::table('course_user')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();

        $finished = DB::table('finished_courses')
            ->where('user_id', '=', $userId)
            ->where('course_id', '=', $id)
            ->get();
        if (count($finished) > 0) {
            // $courses = Course::all();
            $course = Course::find($id);
            $message = 'Congratulations! you already passed this course';

            return view('pages.courseShow', ['message' => $message, 'course' => $course, 'finished' => $finished]);
            // $message = "Congratulations! you already passed this course";
            // return view('pages.courses',['message'=> $message, 'courses' => $courses]);
        } elseif (count($user) > 0) {
            // $courses = Course::all();
            $course = Course::find($id);

            $message = 'you already subscriped this course';

            return view('pages.courseShow', ['message' => $message, 'course' => $course]);
            // return view('pages.courses',['error'=> $error, 'courses' => $courses]);
        } else {

            return redirect()->route('checkout', [$stripe_id]);
        }

    }
}
