<?php

namespace App\Http\Controllers;

class TipsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    public function index($type)
    {
        $id = '#down';

        return view('pages.tips', ['type' => $type, 'id' => $id]);
    }
}
