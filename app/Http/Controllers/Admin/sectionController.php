<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class sectionController extends Controller
{
    public function sections(){
        $sections=Section::get()->all();
        $columns = \Schema::getColumnListing('sections');
        Session::put('page','sections');
        return view('admin.sections.sections')->with(compact('sections'))->with(compact('columns'));
    }
    public function update_status(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status=0;
            }
            else{
                $status=1;
            }
            Section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
}

