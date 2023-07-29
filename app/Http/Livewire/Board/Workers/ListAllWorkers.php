<?php

namespace App\Http\Livewire\Board\Workers;

use Livewire\Component;
use App\Models\User;
class ListAllWorkers extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = User::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $users = User::with('user')
        ->where(function($query){
            $query->where('type' , 2 );
        })
        ->get();
        return view('livewire.board.workers.list-all-workers' , compact('users'));
    }
}
