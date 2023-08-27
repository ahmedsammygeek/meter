<?php

namespace App\Http\Livewire\Board\Workers;

use Livewire\Component;
use App\Models\District;
use App\Models\Area;
use App\Models\City;
class CreateWorker extends Component
{   

    public $area = 'all';
    public $city = 'all';
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $active;

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
        if ($this->area == 'all' ) {
            return District::get();
        }
        return District::where('city_id' , $this->city )->get();
    }


    public function render()
    {
        return view('livewire.board.workers.create-worker');
    }
}
