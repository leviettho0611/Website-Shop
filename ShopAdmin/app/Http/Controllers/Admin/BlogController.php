<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\blog;
 use Illuminate\Support\Facades\File;
use App\Http\Requests\AdminRequest\AddBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datablog=blog::all();
        return view('admin.blog.blog',compact('datablog'));
        // return view('blog.blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBlogRequest $request)
    {   

        $data=$request->all();
        $file = $request->image;
        if (!empty($file)) {
            $data['image']=$file->getClientOriginalName();
            $file->move('admin/image/',$file->getClientOriginalName());
        };

        // dd($data);

        if (blog::create($data)) {
            return redirect('/admin/blog')->with('success',('Update profile success.'));
        }
        else{
            return redirect('/admin/blog')->withError('success',('Update profile success.'));
        }
      
        
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
        echo $id;
        //$dataedit=blog::find($id)->get();
        $dataedit['infor']=blog::find($id)->toArray();
        return view ('admin.blog.editblog',compact('dataedit'));
        // $datablog=blog::all();
        // return view('admin.blog.blog',compact('datablog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddBlogRequest $request, $id)
    {
        // $blogeditname = $request->name;
        // $blogedittxt = $request->txtContent;
        // $blogeditupdate=blog::find($id);
        // $blogeditupdate->name=$blogeditname;
        // $fileblog = $request->image;
        // if (!empty($fileblog)) {
        //     $blogeditupdate['image']=$fileblog->getClientOriginalName();
        //      $fileblog->move('admin/image/',$fileblog->getClientOriginalName());
        // }
        // $blogeditupdate->image=$fileblog;
        // $blogeditupdate->description=$blogedittxt;
        // $blogeditupdate->save();
        // return redirect('/admin/blog')->with('success',('Update profile success.'));


        $dataupdate=$request->all();
        $fileupdate = $request->image;
        $blog=blog::find($id);
        if (!empty($fileupdate)) {
            $dataupdate['image']=$fileupdate->getClientOriginalName();
            $fileupdate->move('admin/image/',$fileupdate->getClientOriginalName());
        };
        if ($blog->update($dataupdate)) {
            return redirect('/admin/blog')->with('success',('Update profile success.'));
        }
        else{
            return redirect('/admin/blog')->withError('success',('Update profile success.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        blog::find($id)->delete();
       return redirect('/admin/blog');
    }
}
