<?php

namespace App\Http\Livewire\Board\Workers;

use Livewire\Component;
use App\Models\District;
use App\Models\Area;
use App\Models\City;
class EditWorker extends Component
{

    public $worker;
    public $area = 'all';
    public $city = 'all';

    public function getAreasProperty()
    {
        return Area::all();
    }

    public function getCitiesProperty()
    {
        return City::where('area_id' , $this->area )->get();
    }

    public function getDistrictsProperty()
    {
        return District::where('city_id' , $this->city )->get();
    }
    public function render()
    {
        return view('livewire.board.workers.edit-worker');
    }
}
