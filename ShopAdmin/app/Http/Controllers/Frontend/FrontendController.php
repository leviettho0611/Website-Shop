<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rate;
use App\Models\product;
use App\Models\brand;
use App\Models\category;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products=product::orderBy('created_at','DESC')->paginate(6);
        
        // $productsimage=product::get()->toArray();
        //  $productsimage = $productsimage;
        // $productsArrImage = json_decode($productsimage['image'], true);
        //dd($products);
        return view('frontend.index.index',compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
         $product = product::all();
        //dd($product);
        return view ("frontend.index.product",compact('product'));
    }
    public function productdetail($id)
    {
        //echo $id;
        $datadetail=product::where('id',$id)->get()->toArray();
        $datadetail = $datadetail[0];
        $getArrImage = json_decode($datadetail['image'], true);
        $databrand3=brand::all();
        //dd($getArrImage);
        //dd($datashowedit);
        //dd($dataeditproduct);
        // $datacategory2=category::all();
        // $databrand2=brand::all();
        // $datasale2=sale::all();
        // $User=Auth::user();
         //dd($datashowedit);

        return view('frontend.index.productdetail',compact('datadetail','getArrImage','databrand3'));
    }
    public function showsearchadvanced(Request $request)
    {
        // $price=$request->price;
        // //dd($arrprice);
        // $arrprice=explode("-",$price);
        // dd($arrprice);
        
        $q=product::query();
        if ($request->name) {
            $q->where('name','like','%'.$request->name.'%');
        }
        
            $price = $request->price;

        switch ($price) {
            case '0-500':
                $q->whereBetween('price', [0, 50]);
                break;
                
                
            case '500-1000':
                $q->whereBetween('price', [500, 1000]);
                break;
            case '>1000':
                $q->where('price', '>', 1000);
                break;
            }
        if($request->category){
            $q->where('id_category',$request->category);
        }
        if($request->brand){
            $q->where('id_brand',$request->brand);
        }
            //$arrPrice=explode("-",$request->price);
            //var_dump($arrprice);
            //  if (count($arrPrice) == 2) {
            //     $q->whereBetween('price', [$arrPrice[0], $arrPrice[1]]);
            // } else {
            //     $q->where('price', '>=', $arrPrice[0]);
            // }
            // if($request->price<1000){
            //     $q->where('price','between',$arrprice[0] , 'and', $arrprice[1]);
            // }else{
            //     $q->where('price','>',$arrprice[0] );
            // }
            
           
        
        

        //$data = $q->get();
        $category = category::all();
        $brand = brand::all();
        $products=$q->paginate(6);
        

        return view('frontend.index.searchadvanced',compact('products','category','brand'));
    }
    public function searchprice(Request $request)
    {
        $searchprice=$request->pricerange;
        //dd($searchprice);
         $arrprice=explode(" : ",$searchprice);
         //dd($arrprice[1]);

         $productprice=product::whereBetween('price',[$arrprice[0],$arrprice[1]])->get();
         return $productprice;
         //dd($productprice);
         //return response()->json(['productprice' => $productprice]);
        // dd($productprice);

         //return view('frontend.account.searchprice',compact('productprice'));
        
    }
    public function search(Request $request)
    {
        $search=$request->name;
        $productname=product::where('name','like','%'.$search.'%')->get();

        return view('frontend.index.searchname',compact('productname'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addrate()
    {
        // $datablogshop=blog::select('id','name')->orderBy('id','DESC')->paginate(3);
        // return view('frontend.menu.menu',compact('datablogshop'));
        // return view('frontend.menu.menu');
    }
    public function show($id)
    {
        // return view('frontend.blogshop.blogshop');
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
