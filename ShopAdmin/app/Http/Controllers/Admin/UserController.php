<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
 use App\Models\User;
 use App\Models\country;
 use App\Http\Requests\AdminRequest\ProfileRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.app');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadfile(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $datacountry1=country::all();
        // dd($datacauthu);
        $User=Auth::user();
        //dd($User) ;
        return view('admin.user.user',compact('datacountry1','User'));
         // return view('user.user');
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        // $request->validate([
        //     'name'=>'required|max:20',
        //     'email'=>'required|max:25',
        //     'password'=>'required|max:20',
        //     'image' => 'image|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        //   ],
        // [
        // 'required'=>':attribute Khong duoc de trong',
        //   'max'=>':attribute khong duoc quá ky tu',
        // ]
        // );
          //   $name = $request->input('name');
          // "<br/>";
          // $email= $request->input('email');
          // "<br/>";
          // $password=$request->input('password');
          // "<br/>";
         
        // $users= new users;
        // $users->name = $request->name;
        // $users->email = $request->email;
        // $users->password = $request->password;

        // if($request->hasFile('fileTest')){
        //     $file=$request->fileTest;
        //     //lay ten files
        //     echo 'Ten Files:' .$file->getClientOriginalName();
        //     echo '<br/>';
        //     //lay duoi files
        //     echo 'duoi Files:' .$file->getClientOriginalExtension();
        //     echo '<br/>';
        //     //Lay duong dan tam thoi cua files
        //     echo 'duong dan tam:'.$file->getRealPath();
        //     echo '<br/>';
        //     //lay kich co cua file don vi tinhs theo bytes
        //     echo 'kich co file: '.$file->getSize();
        //     //lay kieu file
        //     echo 'kieu file: '.$file->getMimeType();
        // }
        // dd($file);
           


        $userid=Auth::id();
        
        $user= User::findOrfail($userid);
        $data=$request->all();
        
        $file=$request->avatar;
        if(!empty($file)){
            $data['avatar']=$file->getClientOriginalName();
        }
        if($data['password']){
            $data['password']=bcrypt($data['password']);
        }else{
            $data['password']=$user->password;
        }
        if($user->update($data)){
            if(!empty($file)){
                $file->move('admin/avatar',$file->getClientOriginalName());
            }
            return redirect()->back()->with('success',('Update profile success.'));
        }else{
            return redirect()->back()->withError('Update profile error.');
        }
         return redirect('admin/user/update');
        // // dd($data);
        
        // return view('user.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
