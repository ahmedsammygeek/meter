<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldSurvey;
use File;
use Storage;
use ZipArchive;
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
        $zip = new ZipArchive;

        $fileName = 'my-images.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {

            // $files = File::files(public_path('files'));
            $files;
            foreach ($field_survey->files as $file) {
                $files[] = Storage::path('field_surveys/'.$file->file);
            }

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }


}
