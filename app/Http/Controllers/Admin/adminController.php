<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function  login(Request $request){
        if($request->isMethod('POST')){
            $validated=Validator::make($request->all(),[
                'email'=>'required|email|max:100',
                'password'=>'required|string|max:50|min:5',
            ]);
            if($validated->fails()){
                return redirect('/admin/login')
                    ->withErrors($validated)
                    ->withInput();
            }
            $cred=Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1]);
            if($cred){
                return redirect('admin/dashboard');

            }
            Session::flash('error', 'Please Type Correct Credentials');


        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return back();
    }


}
