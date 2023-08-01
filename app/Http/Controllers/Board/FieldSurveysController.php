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
            outputName: 'example.zip',
            sendHttpHeaders: true,
        );

        foreach($field_survey->files as $file){
            $zip->addFile(
                fileName: $file->file,
                data:  Storage::get('field_surveys/'.$file->file),
            );
        }


        
        $zip->finish();


        // return response()->streamDownload(function()  {

        //     $opt = new ArchiveOptions();

        //     $opt->setContentType('application/octet-stream');

        //     $zip = new ZipStream("uploads.zip", $opt);


        //     foreach ($field_survey->files as $file) {
        //         try {
        //             $file = Storage::readStream($file->file);
        //             $zip->addFileFromStream($file->file, $file->file);
        //         }
        //         catch (Exception $e) {
        //             \Log::error("unable to read the file at storage path: $file->file and output to zip stream. Exception is " . $e->getMessage());
        //         }

        //     }

        //     $zip->finish();
        // }, 'uploads.zip');

        // $source_disk = 's3';
        // $source_path = '';

        // $file_names = Storage::disk($source_disk)->files($source_path);

        // $zip = new Filesystem(new ZipArchiveAdapter(public_path('archive.zip')));

        // foreach($field_survey->files as $file){
        //     $file_content = Storage::disk($source_disk)->get('field_surveys/'.$file->file);
        //     $zip->put($file_name, $file_content);
        // }

        // $zip->getAdapter()->getArchive()->close();

        // return redirect('archive.zip');

    }


}
