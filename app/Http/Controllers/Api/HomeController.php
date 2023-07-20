<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserTask;
use Carbon\Carbon;
use App\Http\Resources\Api\Home\UserTasksResource;
use App\Http\Resources\Api\Home\UserDistrictResource;
use App\Models\SegmentType;
use App\Models\PropertyType;
use App\Models\MeterType;
use App\Models\UserDistrict;
use App\Http\Requests\Api\FieldSurveyRequest;
use App\Models\FieldSurvey;
use App\Models\FieldSurveyFile;
class HomeController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $tasks = UserTask::with(['task' , 'district'])->where('user_id' , Auth::id() )->whereDate('task_date' , Carbon::today() )->latest()->get();

        return response()->json([
            'status' => true , 
            'message' => '' , 
            'errors' => [] , 
            'data' => (object) [
                'tasks' => UserTasksResource::collection($tasks)
            ]
        ], 200);
    }

    public function dropdowns()
    {
        return response()->json([
            'status' => true , 
            'message' => '' , 
            'errors' => [] , 
            'data' => (object)[
                'segment_types' => SegmentType::select('name' , 'id' )->get() , 
                'property_types' => PropertyType::select('name' , 'id' )->get() , 
                'meter_types' => MeterType::select('id'  , 'name' )->get() , 
                'user_districts' =>  UserDistrictResource::collection( UserDistrict::with('district')->where('user_id'  , Auth::id() )->get()) , 
            ]
        ]);
    }


    public function field_surveys(FieldSurveyRequest $request) {

        $FieldSurvey = new FieldSurvey;
        $FieldSurvey->user_id = Auth::id();
        $FieldSurvey->district_id  = $request->district_id;
        $FieldSurvey->latitude  = $request->latitude;
        $FieldSurvey->longitude  = $request->longitude;
        $FieldSurvey->segment_number  = $request->segment_number;
        $FieldSurvey->segment_type_id  = $request->segment_type_id;
        $FieldSurvey->property_type_id  = $request->property_type_id;
        $FieldSurvey->meter_type_id  = $request->meter_type_id;
        $FieldSurvey->meter_number  = $request->meter_number;
        $FieldSurvey->meters_count  = $request->meters_count;
        $FieldSurvey->comments  = $request->comments;
        $FieldSurvey->client_name  = $request->client_name;
        $FieldSurvey->client_phone  = $request->client_phone;
        $FieldSurvey->client_national_id  = $request->client_national_id;
        $FieldSurvey->save();

        if ($request->hasFile('files')) {
            $files = [];
            for ($i=0; $i <count($request->file('files')) ; $i++) { 
                $files[] = new FieldSurveyFile([
                    'file' => basename($request->file('files.'.$i)->store('field_surveys')) , 
                    'field_survey_id' => $FieldSurvey->id , 
                ]);
            }
            $FieldSurvey->files()->saveMany($files);
        }

        return response()->json([
            'status' => true , 
            'message' => 'تم إضافه المسح الميدانى بنجاح' , 
            'data' => (object)[] , 
            'errors' => [] , 
        ],200);
    }

    
}
