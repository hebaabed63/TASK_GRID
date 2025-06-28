<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::query()->select('*')->get();
        return view('places.index')->with(compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $location = $request->input('location');
        $description = $request->input('description');
        $reselt = Place::query()->create(['name' => $name, 'type' => $type, 'location' => $location, 'description' => $description]);
        $status = false;
        if ($reselt) {
            $status = true;
        }
        return redirect()->back()->with(['status' => $status]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::query()->select('id', 'name', 'type', 'location', 'description')->find($id);
        return view('places.edit')->with(compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $location = $request->input('location');
        $description = $request->input('description');
        $reselt = Place::query()->where('id', $id)
            ->update(['name' => $name, 'type' => $type, 'location' => $location, 'description' => $description]);
        $status = false;
        if ($reselt) {
            $status = true;
        }
        return redirect()->back()->with(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $place = Place::query()->find($id)->delete();
        return redirect()->back();
    }
}
