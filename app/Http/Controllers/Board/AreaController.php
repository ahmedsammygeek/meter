<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use Auth;
use App\Http\Requests\Board\Areas\StoreAreaRequest;
use App\Http\Requests\Board\Areas\UpdateAreaRequest;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAreaRequest $request)
    {
        $area = new Area;
        $area->name = $request->name;
        $area->user_id = Auth::id();
        $area->is_active = $request->filled('active') ? 1 : 0;
        $area->save();
        return redirect(route('board.areas.index'))->with('success'  , 'تم إضافه المنطقه بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        $area->load('user');
        return view('board.areas.show' , compact('area') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('board.areas.edit' , compact('area') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->name = $request->name;
        $area->is_active = $request->filled('active') ? 1 : 0;
        $area->save();
        return redirect(route('board.areas.index'))->with('success'  , 'تم تعديل المنطقه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
