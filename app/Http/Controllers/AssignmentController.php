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
    $request->validate([
        'volunteer_id' => 'required|exists:volunteers,id',
        'task_id' => 'required|exists:tasks,id',
        'notes' => 'nullable|string',
    ]);

    Assignment::create([
        'volunteer_id' => $request->volunteer_id,
        'task_id' => $request->task_id,
        'assigned_at' => now(),
        'notes' => $request->notes,
    ]);

    return redirect()->route('assignments.create')->with('success', 'تم التنسيب بنجاح!');
}
}
