<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()->with('place')->get();

        return view('tasks.index')->with(compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::query()->select(['id', 'name'])->get();
        $categories = ["توزيع", "إدارة", "إسعاف", "مراقبة"];
        return view('tasks.create')->with(compact('places'))->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $place_id = $request->input('place_id');
        $description = $request->input('description');
        $category = $request->input('category');
        $date = $request->input('date');
        $status = $request->input('status');

        $reselt = Task::query()
            ->create([
                'title' => $title,
                'place_id' => $place_id,
                'description' => $description,
                'category' => $category,
                'date' => $date,
                'status' => $status
            ]);
        $stat = false;
        if ($reselt) {
            $stat = true;
        }
        return redirect()->back()->with(['stat' => $stat]);
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

         $task= Task::query()->select('*')->find($id);
        $places = Place::query()->select(['id', 'name'])->get();
        $categories = ["توزيع", "إدارة", "إسعاف", "مراقبة"];
       return view('tasks.edit',['task'=>$task,'places'=>$places,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $place_id = $request->input('place_id');
        $description = $request->input('description');
        $category = $request->input('category');
        $date = $request->input('date');
        $status = $request->input('status');
        $reselt=Task::query()->where('id',$id)
       ->update([
                'title' => $title,
                'place_id' => $place_id,
                'description' => $description,
                'category' => $category,
                'date' => $date,
                'status' => $status
            ]);
       $stat=false;
       if($reselt){
      $stat=true;
       }
       return redirect()->back()->with(['stat' => $stat]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::query()->find($id)->delete();
         return redirect()->back();

    }
}
