<?php

namespace App\Http\Livewire\Board\Products;

use Livewire\Component;
use App\Models\Product;
class ListAllProducts extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Product::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $products = Product::with('user')->get();
        return view('livewire.board.products.list-all-products' , compact('products'));
    }
}
