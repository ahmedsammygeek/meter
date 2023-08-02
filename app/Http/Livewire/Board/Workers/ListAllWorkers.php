<?php

namespace App\Http\Livewire\Board\Workers;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class ListAllWorkers extends Component
{
    use WithPagination;
    protected $listeners = ['deleteITem'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $is_active = 'all' ;



    public function deleteITem($itemId)
    {
        $item = User::find($itemId);
        if ($item) {
            $item->delete();
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedIsActive()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::with('user')
        ->where(function($query){
            $query->where('type' , 2 );
        })
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' )->orWhere('phone' , 'LIKE' , '%'.$this->search.'%' )->orWhere('email' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->is_active != 'all' , function($query){
            $query->where('is_active' , $this->is_active );
        })
        ->paginate(30);
        return view('livewire.board.workers.list-all-workers' , compact('users'));
    }
}
