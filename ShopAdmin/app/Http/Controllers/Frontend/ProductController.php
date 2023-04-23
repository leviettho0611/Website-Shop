<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\country;
use App\Models\brand;
use App\Models\sale;
use App\Models\product;
use Image;
use App\Http\Requests\FrontendRequest\AddProductRequest;
use App\Http\Requests\FrontendRequest\EditProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }
    
    public function productdetail($id)
    {
        //
    }
    public function showmyproduct()
    {
        // $getProduct = product::find(1)->toArray();

        // $getArrImage = json_decode($getProduct['image'], true);
        $myproduct = product::all()->where('id_user', Auth::user()->id);
        //dd($product);
        //dd($getArrImage);
        //phai chuyen them product all nua
         //dd($getProduct['image']);
        return view ("frontend.product.myproduct",compact('myproduct'));
    }
    public function showaddproduct()
    {
        $datacategory1=category::all();
        $databrand1=brand::all();
        $datasale1=sale::all();
        $User=Auth::user();
        // dd($datacategory1);

        return view('frontend.product.addproduct',compact('datacategory1','databrand1','datasale1','User'));
         
        //return view ("frontend.product.addproduct");
    }
    public function addproduct(AddProductRequest $request)
    {
         $product=$request->all();
        
        
        if($request->hasfile('image'))
        {

            foreach($request->file('image') as $image)
            {

                $name = $image->getClientOriginalName();
                $name_2 = "hinh85_".$image->getClientOriginalName();
                $name_3 = "hinh329_".$image->getClientOriginalName();
                
                $path = public_path('frontend/imageproduct/' . $name);
                $path2 = public_path('frontend/imageproduct/' . $name_2);
                $path3 = public_path('frontend/imageproduct/' . $name_3);

                // chỉnh file tạm và đưa vào đường dẫn với tên file

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                
                $data[] = $name;
                
            }
        }
        $product['image'] = json_encode($data);
        $product['id_user'] = Auth::User()->id;
        //dd($product);
        if (product::create($product)) {
            return redirect('/')->with('success','Add product success.');
        }
        else{
            return redirect('/shop/addproduct')->withErrors(' Add product error');
        }
        // $product= new product();
        // $product->name=$request->name;
        // $product->price=$request->price;
        // $product->id_category=$request->id_category;
        // $product->id_brand=$request->id_brand;
        // $product->id_sale=$request->id_sale;
        // $product->sale=$request->sale;
        // $product->company=$request->company;
        // $product->image=json_encode($data);
        // $product->detail=$request->detail;
        // $product->save();
        //  dd($product);
        // return back()->with('success', 'Your images has been successfully');
    }
    public function showeditproduct($id)
    {
        echo $id;
        $datashowedit=product::where('id',$id)->get()->toArray();
        $datashowedit = $datashowedit[0];
        $getArrImage = json_decode($datashowedit['image'], true);
        //dd($datashowedit);
        //dd($dataeditproduct);
        $datacategory2=category::all();
        $databrand2=brand::all();
        $datasale2=sale::all();
        $User=Auth::user();
         //dd($datashowedit);

        return view('frontend.product.editproduct',compact('datacategory2','databrand2','datasale2','User','datashowedit','getArrImage'));
         
        //return view ("frontend.account.addproduct");
    }

    
    public function editproduct(EditProductRequest $request, $id)
    {
        $dataedit=$request->all();
        $product=product::find($id);
        
         
         // dem hinh moi va hinh cu neu lon hon 3 thi bao loi duoi update
        $datahinhcu=$product['image'];
        $datahinhcuArr=json_decode($product['image'], true);

        // $hinhxoa=$dataedit['hinhxoa'];
        
        //day la phan xoa
        if(isset($dataedit['hinhxoa']) && count($dataedit['hinhxoa']) > 0){
            foreach ($datahinhcuArr as $key => $value) { 
            
                if(in_array($value,$dataedit['hinhxoa'])){
                  
                    unset($datahinhcuArr[$key]);
                }
             }
             // hinh con lai sau khi xoa
            $datahinhcuArr =  array_values($datahinhcuArr);
        }
        
        //dd($datahinhcuArr); 
        $data = [];
        if($request->hasfile('image')){
               if(count($datahinhcuArr) + count($dataedit['image']) > 3){
                    alert('loi');
               }else{
                   
                   
                    // phan them 
                        foreach($request->file('image') as $image)
                        {

                            $name = $image->getClientOriginalName();
                            $name_2 = "hinh85_".$image->getClientOriginalName();
                            $name_3 = "hinh329_".$image->getClientOriginalName();
                            
                            $path = public_path('frontend/imageproduct/' . $name);
                            $path2 = public_path('frontend/imageproduct/' . $name_2);
                            $path3 = public_path('frontend/imageproduct/' . $name_3);

                            // chỉnh file tạm và đưa vào đường dẫn với tên file

                            Image::make($image->getRealPath())->save($path);
                            Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                            Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                            
                            $data[] = $name;
                            
                        }
                        //mer 2 mang lai(phan them va phan xoa):
                        $data= array_merge($datahinhcuArr , $data);
                   
               }
        }else{
            //chi xoa
            $data=$datahinhcuArr;
        }
   
        //     $dataedit['image'] =  array_values($datahinhcuArr);
        // var_dump($dataedit['image']);
          
        $dataedit['image'] = json_encode($data);
        
            if ($product->update($dataedit)) {
            return redirect('/')->with('success','Update product success.');
            }
            else{
                return redirect('/shop/editproduct')->withErrors('Update product error');
            }
        
       
    }
    
    public function searchprice(Request $request)
    {
       //
        
    }
    
    public function showsearchadvanced(Request $request)
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
        //echo $id;
        product::find($id)->delete();
       return redirect('/shop/myproduct');
    }
}
