<?php

use App\Http\Controllers\AdminCoursesController;
use App\Http\Controllers\AdminQuizzesController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\VideosController;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::resource('services', ServicesController::class);
    Route::resource('courses', AdminCoursesController::class);
    Route::resource('quizzes', AdminQuizzesController::class);
    Route::resource('questions', QuestionsController::class);
    Route::get('courses/videos/{id}', [AdminCoursesController::class, 'courseVideos']);
    Route::get('courses/quizzes/{id}', [AdminCoursesController::class, 'courseQuizzes']);
    Route::resource('videos', VideosController::class);
    Route::get('videos/show/{video_path}', [VideosController::class, 'showVideo']);
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('services', [ServicesController::class, 'view']);

Route::resource('Courses', CoursesController::class)->only([
    'index', 'show', 'create', 'store',
]);
Route::resource('quiz', QuizController::class);

Route::get('quizzes/submit', [QuizController::class, 'submit']);

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Route
     */
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout.perform');
});

Route::get('Courses/video/show/{video_path}', [CoursesController::class, 'showVideo']);

Route::get('quiz/pof', function () {
    return view('PassOrFail');
});
Route::get('services/{type}', [ServicesController::class, 'viewService']);

Route::get('tips/{type}', [TipsController::class, 'index']);

Route::get('Courses/submit/{id}', [CoursesController::class, 'submit'])->name('submit');

Route::get('Course/certificate/{id}', [CertificateController::class, 'index']);

Route::get('Courses/buying/{id}', [CoursesController::class, 'buying'])->name('buy');

Route::get('course-checkout/{stripe_id}', function ($stripe_id) {
    $course = Course::where('stripe_id', $stripe_id)->first();
    $id = $course->id;

    return Auth::user()->checkout($stripe_id, [
        'success_url' => route('buy', [$id]),
        'cancel_url' => route('Courses.index'),
    ]);
})->name('checkout');

Auth::routes();
