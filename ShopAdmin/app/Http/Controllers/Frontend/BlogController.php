<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\rate;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datablogshopdetail=blog::orderBy('id','DESC')->paginate(3);
        return view('frontend.blogshop.blogshop',compact('datablogshopdetail'));
        // return view('frontend.blogshop.blogshop');
    }

    public function detail($id)
    {
        // $blog= blog::all();
       $dataedit=blog::where('id',$id)->get()->toArray();
       // $rate=rate::where('id_blog',$id)->get();
       $ratetbc=rate::where('id_blog',$id)->avg('rate');
       // echo $rate;
       $roundrate=round($ratetbc);
       $countrate=rate::where('id_blog',$id)->count();
       $dataedit = $dataedit[0];
       $datacomment=comment::where('id_blog',$id)->get();
       // $datareplevel=comment::select('level')->get()->toArray();
       // $datarep=comment::where('id','level')->get();
       // $datacomment = $datacomment[0];
           //dd($datarep);
      
        // dd($data);
        return view('frontend.blogshop.blogdetail',compact('dataedit','roundrate','countrate','datacomment'));
    }

    public function blog_rate(Request $request)
    {
        //echo 123;
        $rateall= $request->all();
        $id = Auth::id();
        $rateall['id_user']=$id;
        // var_dump($rateall);
        if (rate::create($rateall)) {
            return redirect('/')->with('success','Update blog rate success.');
        }
        else{
            return redirect('/blogshop')->withErrors('Update blog rate error');
        }
         // return response($rateall);
    }
    public function blog_comment(Request $request, $id)
    {
        $commentall= $request->all();
        $idauth = Auth::id();
        $imgauth = Auth::user()->avatar;
        //dd($imgauth);
         $nameauth = Auth::user()->name;
        //dd($nameauth);
          //$level = $request->level;
        $commentall['name']=$nameauth;
        $commentall['id_user']=$idauth;
        $commentall['id_blog']=$id;
        $commentall['image']=$imgauth;
        $commentall['level']=$request->level;

               //dd($commentall);
         if (comment::create($commentall)) {
            return redirect('/')->with('success',('Update comment success.'));
        }
        else{
            return redirect('/blogshop/')->withErrors('Update comment error');
        }
        //return view('frontend.blogshop.blogdetail',compact('commentall'));
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
