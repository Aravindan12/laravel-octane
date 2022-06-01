<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Support\Facades\Bus;
use App\Jobs\FileJob;

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
        $data = Bus::chain([
            new FileJob($collection),
        ])->dispatch();
            dd($data);
        return view('file',compact('data'));

    }


    public function getUserList(){
        // (new FastExcel(User::all()))->export('users.csv', function ($user) {
        //     return [
        //         'Email' => $user->email,
        //         'First Name' => $user->name,
        //     ];
        // });
        return (new FastExcel(User::all()))->download('file.csv');
    }

    public function queueTest(){
        Bus::chain([
            new FileJob(),
        ])->dispatch();
    }
}
