<?php

namespace App\Http\Livewire\Board\FieldSurveys;

use Livewire\Component;
use App\Models\FieldSurvey;
use App\Models\District;
use App\Models\Area;
use App\Models\City;
use App\Models\PropertyType;
use App\Models\SegmentType;
use App\Models\MeterType;
use Livewire\WithPagination;
use Excel;
use App\Exports\ExportFieldSurveyExcel;
class ListAllFieldSurveys extends Component
{
    use WithPagination;
    protected $listeners = ['deleteITem'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $area = 'all';
    public $city = 'all';
    public $district = 'all';
    public $property_type = 'all';
    public $segment_type = 'all';
    public $meter_type = 'all';


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


    public function getSegmentTypesProperty()
    {
        return SegmentType::all();
    }

    public function getPropertyTypesProperty()
    {
        return PropertyType::all();
    }

    public function getMeterTypesProperty()
    {
        return MeterType::all();
    }

    public function deleteITem($itemId)
    {
        $item = FieldSurvey::find($itemId);
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
        $FieldSurveys =  $this->generateQuery();
        return Excel::download(new ExportFieldSurveyExcel($FieldSurveys) , 'field_surveys.xlsx' );
    }


    public function generateQuery()
    {
        return FieldSurvey::with(['user' , 'district' , 'property_type' , 'segment_type' , 'meter_type' ])
        ->when($this->search , function($query){
            $query
            ->where('segment_number' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('meter_number' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('client_name' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('client_phone' , 'LIKE' , '%'.$this->search.'%' )
            ->orWhere('client_national_id' , 'LIKE' , '%'.$this->search.'%' );
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
        ->when($this->property_type != 'all'  , function($query){
            $query->where('property_type_id' , $this->property_type );
        })
        ->when($this->segment_type != 'all'  , function($query){
            $query->where('segment_type_id' , $this->segment_type );
        })
        ->when($this->meter_type != 'all'  , function($query){
            $query->where('meter_type_id' , $this->meter_type );
        })->latest();
    }

    public function render()
    {
        $FieldSurveys = $this->generateQuery()->paginate(30);
        return view('livewire.board.field-surveys.list-all-field-surveys' , compact('FieldSurveys'));
    }
}
