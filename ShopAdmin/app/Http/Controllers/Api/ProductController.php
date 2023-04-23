<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;

    public function index()
    {
        //
    }
    public function productHome()
    {
        $getproducts=product::where('id_user', Auth::user()->id)->orderBy('created_at','DESC')->paginate(6);
        return response()->json([
            'response' => 'success',
            'data' => $getproduct
        ], $this->successStatus);
    }
    public function productlist()
    {
        $getproductlist = product::paginate(6);
        // dd($getproduct);
        return response()->json([
            'response' => 'success',
            'data' => $getproductlist
        ], $this->successStatus);
    }
    public function detail($id)
    {
        $data = product::findOrFail($id);
        return response()->json([
            'response' => 'success',
            'data' => $data
        ], $this->successStatus);
       
    }
    public function showmyproduct()
    {
        $getAllProductUser = product::all()->where('id_user', Auth::user()->id)->toArray();
        return response()->json([
            'response' => 'success',
            'data' => $getAllProductUser
        ], $this->successStatus);
       
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
            return redirect('/')->with('success',('Update profile success.'));
        }
        else{
            return redirect('/shop/addproduct')->withError('error_file',('error'));
        }
    }

    public function listCategoryBrand()
    {
        $Category = category::all()->toArray();
        $Brand = brand::all()->toArray();

        return response()->json([
            'message' => 'success',
            'category' => $Category,
            'brand' => $Brand
        ], JsonResponse::HTTP_OK);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = product::findOrFail($id);
        $data['image'] = json_decode($data['image'], true);
        return response()->json([
            'response' => 'success',
            'data' => $data
        ], $this->successStatus);
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
            return response()->json([
                'response' => 'success',
                'data' => $dataedit
            ], $this->successStatus);
            }
            else{
                return response()->json([
                'message' => 'image only upload maximun 3 file',
            ], $this->successStatus);
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
        product::find($id)->delete();
        $getAllProductUser = product::all()->where('id_user', Auth::User()->id);
        return response()->json([
                'response' => 'success',
                'data' => $getAllProductUser
            ], $this->successStatus);
    }
}
