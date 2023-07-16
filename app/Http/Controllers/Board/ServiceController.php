<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Services\StoreServiceRequest;
use App\Http\Requests\Board\Services\UpdateServiceRequest;
use Auth;
use App\Models\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $service = new Service;
        $service->setTranslation('name' , 'ar', $request->name_ar );
        $service->setTranslation('name' , 'en', $request->name_en );
        $service->setTranslation('subtitle' , 'ar', $request->subtitle_ar );
        $service->setTranslation('subtitle' , 'en', $request->subtitle_en );
        $service->setTranslation('content' , 'ar', $request->content_ar );
        $service->setTranslation('content' , 'en', $request->content_en );
        $service->user_id = Auth::id();
        $service->is_active = $request->filled('active') ? 1 : 0;
        $service->save();

        return redirect(route('board.services.index'))->with('success' , 'تم إضافه الخدمه بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('board.services.show' , compact('service') );
    }


    public function edit(Service $service)
    {
        return view('board.services.edit' , compact('service'));
    }


    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->setTranslation('name' , 'ar', $request->name_ar );
        $service->setTranslation('name' , 'en', $request->name_en );
        $service->setTranslation('subtitle' , 'ar', $request->subtitle_ar );
        $service->setTranslation('subtitle' , 'en', $request->subtitle_en );
        $service->setTranslation('content' , 'ar', $request->content_ar );
        $service->setTranslation('content' , 'en', $request->content_en );
        $service->user_id = Auth::id();
        $service->is_active = $request->filled('active') ? 1 : 0;
        $service->save();

        return redirect(route('board.services.index'))->with('success' , 'تم تعديل الخدمه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
