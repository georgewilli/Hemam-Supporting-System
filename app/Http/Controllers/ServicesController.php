<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();

        return view('Admin.services.index', [
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:services',
            'type' => 'required|string',
            'description' => 'required|string|unique:services',
            'url' => 'required|string|unique:services',
            'district' => 'required|string',
        ]);
        $services = Services::create([
            'title' => $request->input('title'),
            'type' => $request->type,
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'district' => $request->input('district'),
        ]);

        return redirect('/admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Services::find($id)->first();

        // show the view and pass the shark to it
        return view('Admin.services.show', ['services' => $services]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Services::find($id);

        return view('Admin.services.edit', ['services' => $services]);
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
            'title' => 'required|string|unique:services',
            'type' => 'required|string|unique:services',
            'description' => 'required|string|unique:services',
            'url' => 'required|string|unique:services',
            'district' => 'required|string',
        ]);
        $services = Services::where('id', $id)->update([
            'title' => $request->input('title'),
            'type' => $request->type,
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'district' => $request->input('district'),
        ]);

        return redirect('/admin/services');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();

        return redirect('/admin/services');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewService($type)
    {
        $services = DB::table('services')
            ->where('type', '=', $type)->get();

        return view('pages.showServices', ['services' => $services, 'type' => $type]);
    }

    public function view()
    {
        return view('pages.services');
    }
}
