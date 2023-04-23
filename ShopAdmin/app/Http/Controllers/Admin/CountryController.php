<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\User;
use App\Models\country;
 use App\Http\Requests\AdminRequest\AddCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacountry=country::all();
        // dd($datacauthu);
        return view('admin.country.country',compact('datacountry'));
        // return view('country.country');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo $id;
        return view('admin.country.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCountryRequest $request)
    {

        // chinhr error validate truc tiep
        // kiem tra khoa ngoai
        $request->validate([
            'name'=>'required|max:20',
            
          ],
        [
        'required'=>':attribute Khong duoc de trong',
          'max'=>':attribute khong duoc quá ky tu',
        ]
        );
        // echo $id;
        $title = $request->input('name');
        "<br/>";
        $datatitle=new country();
        $datatitle->name=$title;
        $datatitle->save();
        
        return redirect('/admin/country');
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
        echo $id;
        country::find($id)->delete();
       return redirect('/admin/country');
    }
}
