<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $videos = Video::all();

        return view('Admin.videos.index', [
            'videos' => $videos,

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

        return view('Admin.videos.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_name' => 'required|string|unique:courses_videos',
            'description' => 'required|string|unique:courses_videos',
            'course_id' => 'required|integer',
            'video_path' => 'required|mimes:mp4,ogx,webm',

        ]);

        $videoName = str_replace(' ', '_', $request->video_name);
        $newVideoName = $videoName . $request->course_id . '.' . $request->video_path->extension();
        $request->video_path->move(public_path('videos'), $newVideoName);

        $video = Video::create([
            'course_id' => $request->course_id,
            'video_name' => $request->input('video_name'),
            'description' => $request->input('description'),
            'video_path' => $newVideoName,
        ]);

        $videosnum = Video::where('course_id', $request->course_id)->get();
        $countervideos = $videosnum->count();
        $services = Course::where('id', $request->course_id)->update([
            'videos_number' => $countervideos,
        ]);

        return redirect('/admin/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        // show the view and pass the shark to it
        return view('Admin.videos.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $courses = Course::all();

        return view('Admin.videos.edit',
            ['video' => $video,
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
            'video_name' => 'required|string',
            'description' => 'required|string',
            'course_id' => 'required|integer',
            'video_path' => 'required|mimes:mp4,ogx,webm',

        ]);
        $videoName = str_replace(' ', '_', $request->video_name);
        $newVideoName = $videoName . $request->course_id . '.' . $request->video_path->extension();
        $request->video_path->move(public_path('videos'), $newVideoName);

        $services = Video::where('id', $id)->update([
            'course_id' => $request->course_id,
            'video_name' => $request->input('video_name'),
            'description' => $request->input('description'),
            'video_path' => $newVideoName,
        ]);

        return redirect('/admin/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        $videosnum = Video::where('course_id', $video->course_id)->get();
        $countervideos = $videosnum->count();
        $services = Course::where('id', $video->course_id)->update([
            'videos_number' => $countervideos,
        ]);

        return redirect('/admin/videos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVideo($video)
    {
        return view('Admin.videos.showVideo', ['video' => $video]);
    }
}
