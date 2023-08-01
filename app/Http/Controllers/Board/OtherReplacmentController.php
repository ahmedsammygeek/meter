<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherReplacement;
use ZipStream;
use Storage;
class OtherReplacmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.other_replacements.index');
    }

   
    /**
     * Display the specified resource.
     */
    public function show(OtherReplacement $other_replacement)
    {
        $other_replacement->load(['user' , 'district' ]);
        return view('board.other_replacements.show' , compact('other_replacement') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function download(OtherReplacement $other_replacement)
    {
        $zip = new ZipStream\ZipStream(
            outputName: 'images.zip',
            sendHttpHeaders: true,
            enableZip64: true,
        );

        foreach($other_replacement->files as $file){
            $zip->addFile(
                fileName: $file->file,
                data:  Storage::get('other_replacements/'.$file->file),
            );
        }
        $zip->finish();
    }


}
