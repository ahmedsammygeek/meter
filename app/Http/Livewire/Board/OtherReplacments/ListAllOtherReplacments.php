<?php

namespace App\Http\Livewire\Board\OtherReplacments;

use Livewire\Component;
use App\Models\OtherReplacement;
use App\Models\District;
use App\Models\Area;
use App\Models\City;
use Livewire\WithPagination;
use Excel;
use App\Exports\ExportMeterReplacmentExcel;
class ListAllOtherReplacments extends Component
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
    public $type = 'all';


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




    public function deleteITem($itemId)
    {
        $item = OtherReplacement::find($itemId);
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
        return OtherReplacement::with(['user' , 'district'  ])
        ->when($this->search , function($query){
            $query
            ->where('segment_number' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('current_meter_read' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('current_meter_number' , 'LIKE' , '%'.$this->search.'%' );
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
        ->when($this->type != 'all'  , function($query){
            $query->where('type' , $this->type );
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
        $OtherReplacements = $this->generateQuery()->paginate(30);
        return view('livewire.board.other-replacments.list-all-other-replacments' , compact('OtherReplacements'));
    }
}
