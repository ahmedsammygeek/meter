<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Models\SegmentType;
use App\Models\PropertyType;
use App\Models\MeterType;
use App\Models\UserDistrict;
use App\Models\FieldSurvey;
use App\Models\FieldSurveyFile;
use App\Models\UserTask;
use App\Models\MeterReplacement;
use App\Models\MeterReplacementFile;
use App\Models\OtherReplacement;
use App\Models\OtherReplacementFile;
use App\Models\MeterCompany;

use App\Http\Requests\Api\FieldSurveyRequest;
use App\Http\Requests\Api\StoreMeterReplacementRequest;
use App\Http\Requests\Api\StoreOtherReplacementRequest;
use App\Http\Resources\Api\Home\UserTasksResource;
use App\Http\Resources\Api\Home\UserDistrictResource;
use Auth;
class HomeController extends Controller
{


    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => true , 
            'message' => 'تم تسجيل الخروج بنجاح' , 
            'errors' => [] , 
            'data' => (object) []            
        ], 200 , 
    }

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
        ], 200 , 

        [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Content-Encoding' => 'gzip', 
            'Charset' => 'utf-8' , 
        ],
        JSON_UNESCAPED_UNICODE
    );
    }

    public function dropdowns()
    {
        return response()->json([
            'status' => true , 
            'message' => '' , 
            'errors' => [] , 
            'data' => (object)[
                'meter_companies' => MeterCompany::where('is_active' , 1 )->select('id' , 'name' )->get() , 
                'segment_types' => SegmentType::where('is_active' , 1 )->select('name' , 'id' )->get() , 
                'property_types' => PropertyType::where('is_active' , 1 )->select('name' , 'id' )->get() , 
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
        ],200  ,
        [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Content-Encoding' => 'gzip', 
            'Charset' => 'utf-8' , 
        ],
        JSON_UNESCAPED_UNICODE
    );
    }


    public function meter_replacements(StoreMeterReplacementRequest $request)
    {
        $MeterReplacement = new MeterReplacement;
        $MeterReplacement->latitude = $request->latitude;
        $MeterReplacement->longitude = $request->longitude;
        $MeterReplacement->district_id = $request->district_id;
        $MeterReplacement->segment_number = $request->segment_number;
        $MeterReplacement->status = $request->status;
        $MeterReplacement->old_meter_number = $request->old_meter_number;
        $MeterReplacement->old_meter_read = $request->old_meter_read;
        $MeterReplacement->new_meter_number = $request->new_meter_number;
        $MeterReplacement->new_meter_read = $request->new_meter_read;
        $MeterReplacement->new_meter_company_id = $request->new_meter_company_id;
        $MeterReplacement->comments = $request->comments;
        $MeterReplacement->user_id = Auth::id();
        $MeterReplacement->save();


        if ($request->hasFile('files')) {
            $files = [];
            for ($i=0; $i <count($request->file('files')) ; $i++) { 
                $files[] = new MeterReplacementFile([
                    'file' => basename($request->file('files.'.$i)->store('meter_replacements')) , 
                    'meter_replacement_id' => $MeterReplacement->id , 
                ]);
            }
            $MeterReplacement->files()->saveMany($files);
        }

        return response()->json([
            'status' => true , 
            'message' => 'تم إضافه مهمل استبدال العداد بنجاح' , 
            'data' => (object)[] , 
            'errors' => [] , 
        ],200 ,  [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Content-Encoding' => 'gzip', 
            'Charset' => 'utf-8' , 
        ],
        JSON_UNESCAPED_UNICODE );
    }

    public function other_replacements(StoreOtherReplacementRequest $request )
    {

        $OtherReplacement = new OtherReplacement;
        $OtherReplacement->district_id = $request->district_id;
        $OtherReplacement->status = $request->status;
        $OtherReplacement->longitude = $request->longitude;
        $OtherReplacement->latitude = $request->latitude;
        $OtherReplacement->comments = $request->comments;
        $OtherReplacement->segment_number = $request->segment_number;
        $OtherReplacement->current_meter_number = $request->current_meter_number;
        $OtherReplacement->current_meter_read = $request->current_meter_read;
        $OtherReplacement->user_id = Auth::id();
        $OtherReplacement->type = $request->type;
        $OtherReplacement->save();



        if ($request->hasFile('files')) {
            $files = [];
            for ($i=0; $i <count($request->file('files')) ; $i++) { 
                $files[] = new OtherReplacementFile([
                    'file' => basename($request->file('files.'.$i)->store('other_replacements')) , 
                    'mother_replacement_id' => $OtherReplacement->id , 
                ]);
            }
            $OtherReplacement->files()->saveMany($files);
        }

        return response()->json([
            'status' => true , 
            'message' => 'تم الاضافه  بنجاح' , 
            'data' => (object)[] , 
            'errors' => [] , 
        ],200 , [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Content-Encoding' => 'gzip', 
            'Charset' => 'utf-8' , 
        ],
        JSON_UNESCAPED_UNICODE );
    }

    
}
