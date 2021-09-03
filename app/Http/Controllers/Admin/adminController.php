<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isEmpty;

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

    public function settings(){

        $admin=Auth::guard('admin')->user();
        return view('admin.settings')->with(compact('admin'));
    }

    public function check_currentPassword(Request $request){
        $data = $request->all();
        $password=Auth::guard('admin')->user()->password;
        if(Hash::check($data['currentPassword'],$password)){
            echo "true";
        }
        echo "false";
    }

    public function update_currentPassword(Request $request){
        $data=$request->all();
        $currentAdmin=Auth::guard('admin')->user();
        if(Hash::check($data['currentPassword'],$currentAdmin->password)){
            if($data['newPassword']==$data['confirmPassword']){
                Admin::where('id',$currentAdmin->id)
                    ->update(['password'=>Hash::make($data['newPassword'])]);
                Session::flash('success_message', 'Password updated successfully');
            }
            else{
                Session::flash('error', 'Your Passwords Does not match');
            }
        }
        else{
            Session::flash('error', 'your current password is incorrect');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function update_adminDetails(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            $currentAdmin = Auth::guard('admin')->user();
            //data validation
            $validated=Validator::make($request->all(),[
                'adminName'=>'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                'adminMobile'=>'required|regex:/(01)[0-9]{9}/',
                'adminImage'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            if($validated->fails()){
                return redirect()->back()
                    ->withErrors($validated)
                    ->withInput();

            }
//            admin can add or change his profile picture method #1

//            if ($request->hasFile('adminImage')) {
//                $imageTemp = $request->file('adminImage');
//                if($imageTemp->isValid()){
//                    $imageName = time() . '_' . \Str::random(15) . '.' . $imageTemp
//                            ->getClientOriginalExtension();
//                    $imagePath = 'images/admin_images/admin_photos/' . $imageName;
//                    Image::make($imageTemp)->save($imagePath);
//                }
//                else if(!isEmpty($data['currentAdminImage'])){
//                    $imagePath=$data['currentAdminImage'];
//                }
//                else{
//                    $imagePath="";
//                }
//            }


//            admin can add or change his profile picture method #2

//            if ($request->hasFile('adminImage')) {
//                $imageTemp = $request->file('adminImage');
//                if($imageTemp->isValid()){
//                    $extention=$imageTemp->getClientOriginalExtension();
//                    $imageName=rand(111,9999).'.'.$extention;
//                    $imagePath='images/admin_images/admin_photos/'.$imageName;
//                    Image::make($imageTemp)->save($imagePath);
//                }
//                else if(!isEmpty($data['currentAdminImage'])){
//                    $imagePath=$data['currentAdminImage'];
//                }
//                else{
//                    $imagePath="";
//                }
//            }

            Admin::where('id',$currentAdmin->id)
                ->update(['name'=>$data['adminName'], 'mobile'=>$data['adminMobile'],'image'=>$imagePath]);
            Session::flash('success_message', 'Admin Data Updated Successfully');
            return redirect()->back();
        }
    else{
            $admin=Auth::guard('admin')->user();
            return view('admin.details')->with(compact('admin'));        }
    }

}
