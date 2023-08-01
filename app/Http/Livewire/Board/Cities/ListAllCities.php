<?php

namespace App\Http\Livewire\Board\Cities;

use Livewire\Component;
use App\Models\Area;
use App\Models\City;
use Livewire\WithPagination;
class ListAllCities extends Component
{
    use WithPagination;
    protected $listeners = ['deleteITem'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $is_active = 'all' ;



    public function deleteITem($itemId)
    {
        $item = City::find($itemId);
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
        $cities = City::with('user')
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->is_active != 'all' , function($query){
            $query->where('is_active' , $this->is_active );
        })
        ->latest()->paginate(30);
        return view('livewire.board.cities.list-all-cities' , compact('cities'));
    }
}
