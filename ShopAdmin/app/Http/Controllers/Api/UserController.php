<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiRequest\LoginRequest;
use App\Http\Requests\ApiRequest\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;

    public function register(RegisterRequest $request)
    {
        $datapassword=bcrypt($request->password);
        $dataregister=$request->all();
        $dataregister['password']=$datapassword;
        $dataregister['level']=0;


        $file = $request->avatar;
        if (!empty($file)) {
            $dataregister['avatar']=$file->getClientOriginalName();
            $file->move('frontend/avatar',$file->getClientOriginalName());
        };

         //dd($dataregister);

        if ($getUser=User::create($dataregister)) {
            return response()->json([
                'message' => 'success',
                $getUser
            ], JsonResponse::HTTP_OK);
        }
        else{
             return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    public function login(LoginRequest $request)
    {
        $login = [
            'email'=> $request->email,
            'password'=> $request->password,
            'level'=>0
        ];
        $remember= false;
        if($request->remember_me){
            $remember= true;    
        }
        if(Auth::attempt($login, $remember )){
            return response()->json([
                'response' => 'success',
                'data' => Auth::user(),
            ]);
        }else{
            return response()->json([
                'response' => 'error',
                'data' => ['error' =>'invalid email or password'],
            ]);
        }
        //return view('frontend.user.register',compact('dataregister'));
    }
    public function editaccount()
    {
        // $name = $request->name;
          
        // $email= $request->email;
          
        // $password=$request->password;
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
                $file->move('frontend/avatar',$file->getClientOriginalName());
            }
            return response()->json([
                'status' => true,
                'message' => "Update profile success.",

            ],
        }else{
            return response()->json([
                'errors' => 'error update',
            ],
        }
         return response()->json([
                'Auth' => $data
                
            ],
    }
    public function index()
    {
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
    public function store(Request $request)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
