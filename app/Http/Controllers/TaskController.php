<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('tasks.index',);
    }

    public function task()
    {
        if(Auth::user()->role == 'menager')
        {
            $user = Auth::user()->id;
            $tasks = Task::with('createdBy', 'assignetTo')->search()->where('created_by', $user)->paginate(5);
        }
        else
        {
            $tasks = Task::with('createdBy', 'assignetTo')->search()->paginate(5);
        }
        $userid = Auth::user()->id;
        $role = Auth::user()->role;
        return view('tasks.task', compact('tasks', 'role', 'userid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = new Task();
        $users = User::all()->where('role', 'developer');
        return view('tasks.create', compact('tasks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'assignt_to' => 'required',
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.task')->with('message', "Task has been added successfully");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //$task = Task::with('createdBy', 'assignetTo');
        return view('tasks.show' , compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tasks = Task::find($id);
        $users = User::all()->where('role', 'developer');
        return view('tasks.editd', compact('tasks', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $request->validate([
            'task_name' => 'required',
            'assignt_to' => 'required',
        ]);
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('tasks.task')->with('message', "Task has been updated successfully");
    }

    public function statusChange($id, Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $task = Task::find($id);
        $task->update($request->all());

        return redirect()->route('tasks.task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with('message', "Task has been deleted successfully");
    }
}
