<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeterReplacement;
use ZipStream;
use Storage;
class MeterReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.meter_replacements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MeterReplacement $meter_replacement)
    {
        $meter_replacement->load(['user' , 'district' , 'meter_company'] );
        return view('board.meter_replacements.show' , compact('meter_replacement') );
    }


    public function download(MeterReplacement $meter_replacement)
    {
        $zip = new ZipStream\ZipStream(
            outputName: 'images.zip',
            sendHttpHeaders: true,
            enableZip64: true,
        );

        foreach($meter_replacement->files as $file){
            $zip->addFile(
                fileName: $file->file,
                data:  Storage::get('meter_replacements/'.$file->file),
            );
        }
        $zip->finish();
    }


}
