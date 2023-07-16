<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Reviews\StoreReviewRequest;
use App\Http\Requests\Board\Reviews\UpdateReviewRequest;
use Auth;

use App\Models\Review;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $review = new Review;
        $review->setTranslation('comment' , 'ar' , $request->content_ar );
        $review->setTranslation('comment' , 'en' , $request->content_en );
        $review->name = $request->name;
        $review->rate = $request->rate;
        $review->image = basename($request->file('image')->store('reviews'));
        $review->is_active = $request->filled('active') ? 1 : 0;
        $review->user_id = Auth::id();
        $review->save();
        return redirect(route('board.reviews.index'))->with('success' , 'تم إضافه التقييم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('board.reviews.show' ,  compact('review') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('board.reviews.edit' , compact('review') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->setTranslation('comment' , 'ar' , $request->content_ar );
        $review->setTranslation('comment' , 'en' , $request->content_en );
        $review->name = $request->name;
        $review->rate = $request->rate;
        if ($request->hasFile('image')) {
            $review->image = basename($request->file('image')->store('reviews'));
        }
        $review->is_active = $request->filled('active') ? 1 : 0;
        $review->save();
        return redirect(route('board.reviews.index'))->with('success' , 'تم تعديل التقييم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
