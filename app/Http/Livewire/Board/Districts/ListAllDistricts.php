<?php

namespace App\Http\Livewire\Board\Districts;

use Livewire\Component;
use App\Models\Area;
use App\Models\City;
use App\Models\District;
use Livewire\WithPagination;
class ListAllDistricts extends Component
{
    use WithPagination;
    protected $listeners = ['deleteITem'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $is_active = 'all' ;



    public function deleteITem($itemId)
    {
        $item = District::find($itemId);
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
        $districts = District::with('user')
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->is_active != 'all' , function($query){
            $query->where('is_active' , $this->is_active );
        })
        ->latest()->paginate(30);
        return view('livewire.board.districts.list-all-districts' , compact('districts'));
    }
}
