<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{
    public function categories(){
        $categories=Category::get()->all();
        $columns = \Schema::getColumnListing('categories');
        Session::put('page','categories');
        return view('admin.categories.categories')->with(compact('categories'))->with(compact('columns'));
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
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
}
