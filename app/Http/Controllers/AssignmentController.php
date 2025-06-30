<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Place;
use App\Models\Task;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
{

$tasks = Task::with(['Volunteers','place'])->get();

    return view('assignments.index', compact('tasks'));
}
    public function create()
{
    $volunteers = Volunteer::all();
    $places = Place::all();
    return view('assignments.create', compact('volunteers', 'places'));
}
public function getTasks(Place $place)
{
    return response()->json($place->tasks);
}

public function store(Request $request)
{

    $id=$request->volunteer_id;
     $volunteer = Volunteer::with('task')->find($id);
       if(!$volunteer->task){
    Volunteer::query()->findOrFail($id)->update([
        'task_id' => $request->task_id,
    ]);

    return redirect()->route('assignments.create')->with('success', 'تم التنسيب بنجاح!');
}else{
      return redirect()->route('assignments.create')->with('faild', 'المتطوع مضاف الى مهمة مسبقا');

}
}
}
