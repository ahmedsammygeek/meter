<?php

namespace App\Http\Livewire\Board\Users;

use Livewire\Component;
use App\Models\User;
class ListAllUsers extends Component
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
            $query->where('type'  , 1 );
        })
        ->get();
        return view('livewire.board.users.list-all-users' , compact('users'));
    }
}
