<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldSurvey;
use ZipStream;
use Storage;
class FieldSurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.field_surveys.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(FieldSurvey $field_survey)
    {
        $field_survey->load('user' , 'district' , 'files' , 'property_type' , 'segment_type' , 'meter_type' );
        return view('board.field_surveys.show' , compact('field_survey') );
    }


    public function download(FieldSurvey $field_survey)
    {

        $zip = new ZipStream\ZipStream(
            outputName: 'images.zip',
            sendHttpHeaders: true,
            enableZip64: true,
        );

        foreach($field_survey->files as $file){
            $zip->addFile(
                fileName: $file->file,
                data:  Storage::get('field_surveys/'.$file->file),
            );
        }
        $zip->finish();
    }


}
