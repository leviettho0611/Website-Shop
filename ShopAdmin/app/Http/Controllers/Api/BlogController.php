<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\rate;
use App\Models\comment;
use App\Http\Requests\ApiRequest\RateBlogRequest;
use App\Http\Requests\ApiRequest\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Image;

class BlogController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datablogshopdetail=blog::orderBy('id','DESC')->paginate(3);
        //$blog=blog::all();
        $arr = [
          'status' => true,
          'message' => "Danh sách Blog",
          'data'=>$datablogshopdetail
          ];
     return response()->json($arr, 200);
   //      return response()->json([
   //          'status' => true,
   //          'message' => "Danh sách Blog",
   //          'data' => $datablogshopdetail
   //      ]);
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
        $blog = blog::find($id);
         if (is_null($blog)) {
            $arr = [
              'success' => false,
              'message' => 'Không có blog này',
              'dara' => []
            ];
            return response()->json($arr, 200);
         }
         $arr = [
           'status' => true,
           'message' => "Chi tiết Blog ",
           'data'=> $blog
         ];
         return response()->json($arr, 201);
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
    public function destroy(blog $blog)
    {
       //   $blog->delete();
       // $arr = [
       //    'status' => true,
       //    'message' =>'Blog đã được xóa',
       //    'data' => [],
       // ];
       // return response()->json($arr, 200);
    }
    public function rateBlog($id)
    {
        $getAllRate = rate::all()->where('id_blog', $id);
        return response()->json([
            'response' => 'success',
            'data' => $getAllRate
        ], $this->successStatus);


    }
    public function rate(RateBlogRequest $request)
    {
        //echo 123;
        $rateall= $request->all();
        // $id = Auth::id();
        // $rateall['id_user']=$id;
        //var_dump($rateall);
        if (!empty($rateall['id_user'])) {
            if (rate::create($rateall)) {
                return response()->json([
                      'status' => 200,
                      'message' => 'You have rate this blog successfully.'
                    ]);
            }
            else{
               return response()->json([
                      'status' => 200,
                      'message' => 'Lỗi server , bạn đánh giá không thành công.'
                    ]);
            }
             return response($rateall);
        }
    }
    public function comment(CommentRequest $request, $id)
    {

        $data = $request->all();
        if ($id) {
            $getListComment = comment::create($data);
            if($getListComment){
                return response()->json([
                    'status' => 200,
                    'data' => $getListComment
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'error' => 'error'
                ]);
            }
            
        } else {
                return response()->json([
                    'status' => 200,
                    'error' => 'id not found'
                ]);
        }
    }
}
