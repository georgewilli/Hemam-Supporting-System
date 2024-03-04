<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class CertificateController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();

        $finished = DB::table('finished_courses')
            ->where('user_id', '=', $user->id)
            ->where('course_id', '=', $id)
            ->get();

        $userCourse = DB::table('course_user')
            ->where('user_id', '=', $user->id)
            ->where('course_id', '=', $id)
            ->get();
        $course = Course::find($id);

        if (count($userCourse) < 1) {
            $error = 'you are not supscriped to this course yet';

            $courses = Course::all();

            return view('pages.courses', [
                'courses' => $courses,
                'error' => $error]);
        } elseif (count($finished) < 1) {

            $message = 'you need to finish this course first to get your certificate';

            return view('pages.courseShow', ['message' => $message, 'course' => $course]);

        }

        $pdf = PDF::loadView('pages.certificate', compact('user', 'course'));

        return $pdf->stream('Hemam-Certificate.pdf');

    }
}
