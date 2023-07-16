<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Offers\StoreOfferRequest;
use App\Http\Requests\Board\Offers\UpdateOfferRequest;
use Auth;
use App\Models\Offer;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request)
    {
        $offer = new Offer;
        $offer->setTranslation('name' , 'ar' , $request->name_ar );
        $offer->setTranslation('name' , 'en' , $request->name_en );
        $offer->setTranslation('content' , 'ar' , $request->content_ar );
        $offer->setTranslation('content' , 'en' , $request->content_en );
        $offer->is_active = $request->filled('active') ? 1 : 0;
        $offer->user_id = Auth::id();
        $offer->save();

        return redirect(route('board.offers.index'))->with('success' , 'تم إاضف العرض بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        $offer->load('user');
        return view('board.offers.show' , compact('offer') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        return view('board.offers.edit' , compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request,Offer $offer)
    {
        $offer->setTranslation('name' , 'ar' , $request->name_ar );
        $offer->setTranslation('name' , 'en' , $request->name_en );
        $offer->setTranslation('content' , 'ar' , $request->content_ar );
        $offer->setTranslation('content' , 'en' , $request->content_en );
        $offer->is_active = $request->filled('active') ? 1 : 0;
        $offer->save();
        return redirect(route('board.offers.index'))->with('success' , 'تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
