<?php

namespace App\Http\Livewire\Board\Workers;

use Livewire\Component;
use App\Models\Area;
use App\Models\City;
use App\Models\District;
use App\Models\Task;
use App\Models\UserTask;
use Livewire\WithPagination;
class ListAllWorkerTasks extends Component
{
      use WithPagination;
    public $worker;
    public $area = 'all';
    public $task = 'all';
    public $city = 'all';
    public $district = 'all';
    public $starts_at;
    public $ends_at;
    protected $listeners = ['deleteITem'];
    public function deleteITem($itemId)
    {
        $item = UserTask::find($itemId);
        if ($item) {
            $item->delete();
        }
    }

    public function getAreasProperty()
    {
        return Area::all();
    }

    public function getTasksProperty()
    {
        return Task::all();
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
        $user_tasks = UserTask::with(['task' , 'district' ])
        ->where('user_id' , $this->worker->id )
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
        ->when($this->task != 'all'  , function($query){
            $query->where('task_id' , $this->task );
        })
        ->when($this->starts_at, function($query){
            $query->whereDate('task_date' , '>=' , $this->starts_at );
        })
        ->when($this->ends_at, function($query){
            $query->whereDate('task_date' , '<=' , $this->ends_at );
        })
        ->latest()
        ->paginate(30);
        return view('livewire.board.workers.list-all-worker-tasks' , compact('user_tasks') );
    }
}
