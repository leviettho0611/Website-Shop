
@extends('frontend.layoutfe.mainlayout');
@section('content')

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        <form method="GET" action="{{url('/searchadvanced')}}"  class="form-inline" >
                            @csrf
                            <div class="form-group">
                                <input type="form-control" name="name" placeholder="Search">
                            </div>
                            
                            <div  class="form-group" style="width:200px;">
                                <select name='price'>
                                    <option > All Price</option>
                                    <option value="0-500">0-500</option>
                                    <option value="500-1000">500-1000</option>
                                    <option value=">1000">>1000</option>
                                </select>
                            </div>
                            <div  class="form-group" style="width:200px;">
                                <select name='category'>
                                    <option value=>ALL Category</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div  class="form-group" style="width:200px;">
                                <select name='brand'>
                                    <option value=>ALL Brand</option>
                                    @foreach ($brand as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-outline-light my-2 my-sm-0 "type="submit">
                                Search
                            </button>
                        </form>
                        
                        @foreach ($products as $product)
                        <?php
                            $getArrImage = json_decode($product['image'], true);
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            
                                            <img src="{{url('frontend/imageproduct/'.$getArrImage[0])}}" alt="" />
                                            
                                            <h2>{{$product->price}}</h2>
                                            <p>{{$product->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2 >{{$product->price}}</h2>
                                                <p >{{$product->name}}</p>
                                                <a href="#id={{ $product['id'];}}" class="btn btn-default add-to-cart"><i id="{{ $product['id'];}}"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div><!--features_items-->
                    {{$products->links()}}
                    
 @endsection
 @section('js') 
 <script>
 $(document).ready(function () {
                            $("a.add-to-cart").click(function () {
                                var getID = $(this).find("i").attr("id");
                                // var getname = $(this).find("h2").val();
                                // alert(getname);
                                // var getprice = $(this).find("p").val();
                                // console.log(getID);
                                $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                    $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/ajaxcart') }}",
                                    data: {
                                        
                                        
                                        'getID': getID,
                                    },
                                    success:function(data){
                                        console.log(data.success);
                                        $(".tonghang").find("span").text(data.success);
                                        
                                    }

                                });
                                 //console.log(data);    
                                // $(".tonghang").find("span").text(data)

                            })

                        })
 </script>
  @endsection
