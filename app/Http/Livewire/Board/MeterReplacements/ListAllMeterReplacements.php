<?php

namespace App\Http\Livewire\Board\MeterReplacements;

use Livewire\Component;
use App\Models\MeterReplacement;
use App\Models\District;
use App\Models\Area;
use App\Models\City;
use App\Models\MeterCompany;
use Livewire\WithPagination;
use Excel;
use App\Exports\ExportMeterReplacmentExcel;
class ListAllMeterReplacements extends Component
{
    use WithPagination;
    protected $listeners = ['deleteITem'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $area = 'all';
    public $city = 'all';
    public $district = 'all';
    public $meter_company = 'all';
    public $starts_at;
    public $ends_at;


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


    public function getMeterCompaniesProperty()
    {
        return MeterCompany::all();
    }


    public function deleteITem($itemId)
    {
        $item = MeterReplacement::find($itemId);
        if ($item) {
            $item->delete();
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatedArea()
    {
        $this->resetPage();
    }

    public function updatedCity()
    {
        $this->resetPage();
    }

    public function updatedDistrict()
    {
        $this->resetPage();
    }

    public function ExportExcelSheet()
    {
        $MeterReplacements =  $this->generateQuery();
        return Excel::download(new ExportMeterReplacmentExcel($MeterReplacements) , 'MeterReplacements.xlsx' );
    }


    public function generateQuery()
    {
        return MeterReplacement::with(['user' , 'district' , 'meter_company' ])
        ->when($this->search , function($query){
            $query
            ->where('segment_number' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('old_meter_number' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('new_meter_number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->area != 'all'  , function($query){
            $query->whereHas('district' , function($query){
                $query->whereHas('city' , function($query){
                    $query->whereHas('area' , function($query){
                        $query->where('area_id' , $this->area );
                    });
                });
            });
        })
        ->when($this->city != 'all'  , function($query){
            $query->whereHas('district' , function($query){
                $query->whereHas('city' , function($query){
                    $query->where('city_id' , $this->city );
                });
            });
        })
        ->when($this->district != 'all'  , function($query){
            $query->where('district_id' , $this->district );
        })
        ->when($this->meter_company != 'all'  , function($query){
            $query->where('new_meter_company_id' , $this->meter_company );
        })
        ->when($this->starts_at, function($query){
            $query->whereDate('created_at' , '>=' , $this->starts_at );
        })
        ->when($this->ends_at, function($query){
            $query->whereDate('created_at' , '<=' , $this->ends_at );
        })
        ->latest();
    }

    public function render()
    {
        $MeterReplacements = $this->generateQuery()->paginate(30);
        return view('livewire.board.meter-replacements.list-all-meter-replacements' , compact('MeterReplacements'));
    }
}
