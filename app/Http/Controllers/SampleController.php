<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SampleController extends Controller
{
    public function file(){
        return view('file');
    }

    public function fileUpload(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        $collection = (new FastExcel)->import(public_path("uploads/".$fileName));
        foreach($collection as $chunk){
            $a[] =  count($chunk);
            }
        return view('file',compact('a'));
    }
}
