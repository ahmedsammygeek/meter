<?php

namespace App\Http\Livewire\Board\Reviews;

use Livewire\Component;
use App\Models\Review;
class ListAllReviews extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Review::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $reviews = Review::with('user')->get();
        return view('livewire.board.reviews.list-all-reviews' , compact('reviews'));
    }
}
