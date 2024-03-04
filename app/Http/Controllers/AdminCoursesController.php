<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Courses Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for controlling all the courses by the admin
    | to be able to add, modify, delete any course.
    |   
    |
    */

    public function index()
    {
        $courses = Course::all();

        return view('Admin.courses.index', [
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
        return view('Admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:courses',
            'descreption' => 'required|string|unique:courses',
            'price' => 'required|integer',
            'image_path' => 'required|mimes:jpg,png,jpeg',
        ]);
        $imageName = str_replace(' ', '_', $request->name);
        $newImageName = $imageName . $request->course_id . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51KkyTnGHrEGTh2jDB0zfcbMIVXibgjESCO24arpZFcyFxTPrwElaJQEjp69pFXGkcDJuoQHpPAruTONZxldh3F4C00BzahbkIF'
        );

        $courses = Course::create([
            'name' => $request->input('name'),
            'descreption' => $request->input('descreption'),
            'price' => $request->input('price'),
            'image_path' => $newImageName,
        ]);
        $course = Course::where('name', $request->input('name'))->first();

        $stripe->products->create([
            'id' => $course->id,
            'name' => $request->input('name'),
            'description' => $request->input('descreption'),
            // 'images'=>[ asset('images/'. $newImageName)],
        ]);
        $stripe->prices->create([
            'unit_amount' => $request->input('price') * 100,
            'currency' => 'usd',
            'product' => $course->id,
        ]);
        $price = $stripe->prices->all(['product' => $course->id])->first();
        $courses = Course::where('id', $course->id)->update([
            'stripe_id' => $price->id]);

        return redirect('/admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        // show the view and pass the shark to it
        return view('Admin.courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::find($id);

        return view('Admin.courses.edit', ['courses' => $courses]);
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
            'name' => 'required|string',
            'descreption' => 'required|string',
            'price' => 'required|integer',
            'image_path' => 'required|mimes:jpg,png,jpeg',

        ]);

        $imageName = str_replace(' ', '_', $request->name);
        $newImageName = $imageName . $request->course_id . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);

        $courses = Course::where('id', $id)->update([
            'name' => $request->input('name'),
            'descreption' => $request->input('descreption'),
            'price' => $request->input('price'),
            'image_path' => $newImageName,

        ]);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51KkyTnGHrEGTh2jDB0zfcbMIVXibgjESCO24arpZFcyFxTPrwElaJQEjp69pFXGkcDJuoQHpPAruTONZxldh3F4C00BzahbkIF'
        );
        $course = Course::where('name', $request->input('name'))->first();

        $stripe->products->update($id, [
            'name' => $request->input('name'),
            'description' => $request->input('descreption'),
            // 'images'=>[ asset('images/'. $newImageName)],
        ]);

        return redirect('/admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/admin/courses');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseVideos($id)
    {
        $course = Course::where('id', $id)->first();
        $videos = Video::where('course_id', $id)->get();

        return view('Admin.courses.courseVideos', [
            'videos' => $videos,
            'course' => $course,
        ]);
    }

    public function courseQuizzes($id)
    {
        $quizzes = Quiz::where('course_id', $id)->get();
        $course = Course::where('id', $id)->first();

        return view('Admin.courses.courseQuizzes', [
            'quizzes' => $quizzes,
            'course' => $course,
        ]);
    }
}
