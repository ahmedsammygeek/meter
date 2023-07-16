<?php

namespace App\Http\Livewire\Board\Offers;

use Livewire\Component;
use App\Models\Offer;
class ListAllOffers extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Offer::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $offers = Offer::with('user')->get();
        return view('livewire.board.offers.list-all-offers' , compact('offers'));
    }
}
