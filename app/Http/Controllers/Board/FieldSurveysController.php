<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldSurvey;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;
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

        $source_disk = 's3';
        $source_path = '';
        $file_names = Storage::disk($source_disk)->files($source_path);
        $zip = new Filesystem(new ZipArchiveAdapter(public_path('archive.zip')));

        foreach($field_survey->files as $file){
            $file_content = Storage::disk($source_disk)->get('field_surveys/'.$file->file);
            $zip->put($file_name, $file_content);
        }

        $zip->getAdapter()->getArchive()->close();

        return redirect('archive.zip');

        // $zip = new ZipArchive;

        // $fileName = 'my-images.zip';

        // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {

        //     // $files = File::files(public_path('files'));
        //     $files;
        //     foreach ($field_survey->files as $file) {
        //         $files[] = Storage::path('field_surveys/'.$file->file);
        //     }

        //     foreach ($files as $key => $value) {
        //         $relativeNameInZipFile = basename($value);
        //         $zip->addFile($value, $relativeNameInZipFile);
        //     }

        //     $zip->close();
        // }

        // return response()->download(public_path($fileName));
    }


}
