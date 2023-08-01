<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\City;
use App\Http\Requests\Board\Districts\UpdateDistrictRequest;
use App\Http\Requests\Board\Districts\StoreDistrictRequest;
use Auth;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.districts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('board.districts.create' , compact('cities') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistrictRequest $request)
    {
        $district = new District;
        $district->name = $request->name;
        $district->city_id = $request->city_id;
        $district->is_active = $request->filled('active') ? 1 : 0;
        $district->user_id = Auth::id();
        $district->save();
        return redirect(route('board.districts.index'))->with('success' , 'تم إاضهف الحى بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        $district->load(['user' , 'city'] );
        return view('board.districts.show' , compact('district') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( District $district)
    {
        $cities = City::all();
        return view('board.districts.edit' , compact('district' , 'cities') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->name = $request->name;
        $district->city_id = $request->city_id;
        $district->is_active = $request->filled('active') ? 1 : 0;
        $district->save();
        return redirect(route('board.districts.index'))->with('success' , 'تم تعديل الحى بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
