<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteersRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $volunteers=Volunteer::query()->select('*')->get();
        return view('volunteers.index')->with(compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VolunteersRequest $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $skills = $request->input('skils');
        $availabilty = $request->input('availabilty');


        $reselt = Volunteer::query()
            ->create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'skils' => $skills,
                'availabilty' => $availabilty,

            ]);


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
        $volunteer=Volunteer::query()->find($id);
        return view('volunteers.edit')->with(compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VolunteersRequest $request, string $id)
    {

         $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $skills = $request->input('skils');
        $availabilty = $request->input('availabilty');


        $reselt = Volunteer::query()->find($id)
            ->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'skils' => $skills,
                'availabilty' => $availabilty,

            ]);


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
        Volunteer::query()->find($id)->delete();
         return redirect()->back();
    }
}
