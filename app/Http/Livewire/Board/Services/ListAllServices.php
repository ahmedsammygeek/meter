<?php

namespace App\Http\Livewire\Board\Services;

use Livewire\Component;
use App\Models\Service;
class ListAllServices extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Service::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $services = Service::with('user')->get();
        return view('livewire.board.services.list-all-services' , compact('services'));
    }
}
