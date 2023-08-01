<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;
use Auth;
use App\Http\Requests\Board\Cities\StoreCityRequest;
use App\Http\Requests\Board\Cities\UpdateCityRequest;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('board.cities.create' , compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $city = new City;
        $city->name = $request->name;
        $city->area_id = $request->area_id;
        $city->user_id = Auth::id();
        $city->is_active = $request->filled('active') ? 1 : 0;
        $city->save();

        return redirect(route('board.cities.index'))->with('success' , 'تم إضافه المدينه بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $city->load(['user' , 'area' ]);
        return view('board.cities.show' , compact('city') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $areas = Area::all();
        return view('board.cities.edit' , compact('city' , 'areas' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->name = $request->name;
        $city->area_id = $request->area_id;
        $city->is_active = $request->filled('active') ? 1 : 0;
        $city->save();

        return redirect(route('board.cities.index'))->with('success' , 'تم تعديل المدينه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
