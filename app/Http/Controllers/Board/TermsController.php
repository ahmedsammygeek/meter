<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Board\Settings\UpdateTermsRequest;

class TermsController extends Controller
{
   


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
          $settings = Setting::first();
        return view('board.terms.edit' , compact('settings') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermsRequest $request)
    {
        $settings = Setting::first();
        $settings->setTranslation('terms' , 'ar' , $request->terms_ar );
        $settings->setTranslation('terms' , 'en' , $request->terms_en );
        $settings->save();
        return redirect()->back()->with('success' , 'تم تعديل محتوى الشروط و الاحكام بنجاح' );
    }

   
}
