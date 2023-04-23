<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //session()->forget('cart');
       return view('frontend.cart.cart');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         //echo 111;
    
       $id=$request->getID;
       $product=product::where('id',$id)->get()->toArray();
       $product=$product[0];
        //dd($product['image']);
       //dd ($id);
       $array =[];
       $array['id'] = $id;
       $array['qty'] = 1;
       $array['name'] = $product['name'];
       $array['price'] = $product['price'];
       $array['image'] = $product['image'];
       // dd($id);
        if (session()->has('cart')) {

            $getSession = session()->get('cart');
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                $getSession[$key]['qty'] += 1;
                session()->put('cart',$getSession) ;
                $flag = 0;
                break;
                }
            }
            if ($flag == 1) {
                session()->push('cart',$array);
            }
        }else{
            session()->push('cart',$array);
        }
        //dd($array);

        return response()->json(['success'=>'Add product to your cart successfully.']);
    }
    public function create2(Request $request)
    {
         //echo 111;
    
       $id=$request->getID4;
       
       $product=product::where('id',$id)->get()->toArray();
       $product=$product[0];
        //dd($product['image']);
       //dd ($id);
       $array =[];
       $array['id'] = $id;
       $array['qty'] = 1;
       $array['name'] = $product['name'];
       $array['price'] = $product['price'];
       $array['image'] = $product['image'];
       // dd($id);
        if (session()->has('cart')) {

            $getSession = session()->get('cart');
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                $getSession[$key]['qty'] += 1;
                session()->put('cart',$getSession) ;
                $flag = 0;
                break;
                }
            }
            if ($flag == 1) {
                session()->push('cart',$array);
            }
        }else{
            session()->push('cart',$array);
        }
        //dd($array);

        return response()->json(['success'=>'Add product to your cart successfully.']);
    }
    public function ajaxcart1(Request $request)
    {
        //cong
        $id=$request->getID1;
        $x=$request->x;
        if($x==1){
            $a =[];
            $a['id']=$id;
            if (session()->has('cart')) {
                $getSession1 = session()->get('cart');
                $flag = 1;
                  //dd($getSession1);
                foreach ($getSession1 as $key => $value) {
                    if ($value['id'] == $a['id']) {
                        $flag = 0;
                        $getSession1[$key]['qty'] += 1;
                        session()->put('cart',$getSession1) ;
                    }
                }
            }
            if($flag == 1){
                session()->push('cart',$a);
            }
       } 
        
        //tru
       if($x==2){
            
            $b=[];
            $b['id']=$id;
            //dd($b['id']);
            
            if(session()->has('cart')){
                $getSession2=session()->get('cart');
                //dd($getSession2);
                foreach ($getSession2 as $key => $value) {
                    
                    if($value['id'] == $b['id']){
                        $ssqty=$value['qty']-1;
                        if ($ssqty < 1) {

                             unset($getSession2[$key]);
                              //echo '<pre>';
                             //dd($getSession2);
                             session()->put('cart',$getSession2);
                            //vardump ra xem sau unset con gi
                             
                        }else{

                            $getSession2[$key]['qty'] = $ssqty;
                            session()->put('cart',$getSession2);
                        }
                    }
                }

            }
        }
        //xoa
        if($x==3){
            $c=[];
            $c['id']=$id;
            if(session()->has('cart')){
                $getSession3=session()->get('cart');
                //dd($getSession3);
                foreach ($getSession3 as $key => $value) {
                    if($value['id'] == $c['id']){
                        unset($getSession3[$key]);
                        session()->put('cart',$getSession3);
                    }
                }
            }

        }


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
