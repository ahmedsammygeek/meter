<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Workers\UpdateWorkerRequest;
use App\Http\Requests\Board\Workers\StoreWorkerRequest;

use App\Models\User;
use Hash;
use Auth;
class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.workers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        $worker = new User;
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        $worker->password = Hash::make($request->password);
        $worker->type = 2;
        $worker->user_id = Auth::id();
        $worker->is_active = $request->filled('active') ? 1 : 0;
        $worker->save();
        return redirect(route('board.workers.index'))->with('success' , 'تم إاضهف الموظف بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $worker)
    {
        $worker->load('user');
        return view('board.workers.show' , compact('worker') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $worker)
    {
        return view('board.workers.edit' , compact('worker') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request,User $worker)
    {
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        if ($request->filled('password')) {
            $worker->password = Hash::make($request->password);
        }
        $worker->is_active = $request->filled('active') ? 1 : 0;
        $worker->save();
        return redirect(route('board.workers.index'))->with('success' , 'تم تعديل بيانات الموظف بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
