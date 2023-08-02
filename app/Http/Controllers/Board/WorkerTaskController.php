<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\UserTask;
use Auth;
class WorkerTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $worker)
    {
        return view('board.tasks.index' , compact('worker') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $worker)
    {
        $tasks = Task::all();
        return view('board.tasks.create' , compact('worker' , 'tasks') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,  User $worker)
    {
        $user_task = new UserTask;
        $user_task->task_id = $request->task_id;
        $user_task->district_id = $request->district_id;
        $user_task->user_id = $worker->id;
        $user_task->added_by = Auth::id();
        $user_task->task_date = $request->date;
        $user_task->save();
        return redirect(route('board.workers.tasks.index' , $worker ))->with('success' , 'تم إاضهف المهم الى الموظف بنجاح' );
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
