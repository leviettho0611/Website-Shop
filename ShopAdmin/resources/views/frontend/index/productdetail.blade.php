
@extends('frontend.layoutfe.mainlayout');
@section('content')

	
<div class="product-details"><!--product-details-->

						<div class="col-sm-5">
						 
							<div class="view-product">
								
								<img class="anhto" src="{{url('frontend/imageproduct/'.$getArrImage[0])}}" alt="" />
								<a class="zoom" href="{{url('frontend/imageproduct/'.$getArrImage[0])}}" rel="prettyPhoto"><h3>ZOOM</h3></a>
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
											@foreach($getArrImage as $value)
										  <a href=""><img class="img" src="{{url('frontend/imageproduct/'.$value)}}" width="100px" alt=""></a>
										  @endforeach
										</div>
										
										<!-- <div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div> -->
										
									</div>

								  <!-- Controls -->
								  <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
							</div>

						</div>

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><b>Name:</b><?php echo $datadetail['name'] ?></h2>
								<p><b>ID:</b><?php echo $datadetail['id'] ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><b>Price:</b><?php echo $datadetail['price'] ?></span>
									
									<a href="#id={{ $datadetail['id'];}}" type="button" class="btn btn-default add-to-cart"><i id="{{ $datadetail['id'];}}"></i>Add to cart</a>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> 
									<?php 
									if(isset($datadetail['id_brand'])){
										foreach($databrand3 as $value)
										{
											if ($datadetail['id_brand']== $value->id) {
												echo $value->name;
											}
											
										}

									} 
									?>
								</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->

						</div>
						
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
@endsection
@section('js')
<script>
$(document).ready(function(){

	$("a.add-to-cart").click(function () {
                                var getID4 = $(this).find("i").attr("id");
                                
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
                                    url: "{{ url('/ajaxcart2') }}",
                                    data: {
                                        
                                        'getID4': getID4,
                                        
                                    },
                                    success:function(data){
                                        console.log(data.success);
                                        
                                        
                                    }

                                });
                                 //console.log(data);    
                                // $(".tonghang").find("span").text(data)

                            })

            $("img").click(function(e){
            	e.preventDefault();
                var xx =$(this).attr("src");
                //alert(xx)
                $(".anhto").attr("src",xx)
                
                $("a[rel^='prettyPhoto']").prettyPhoto();
            })
        })

// $(document).ready(function(){
// 			// $('.zoom').click(function(e)){
//             // 	e.preventDefault();
//             // 	var yy =$(".anhto").attr("src");
//             // 	$(".zoom").attr("href",yy)
//             	$("a[rel^='prettyPhoto']").prettyPhoto();
            	
//             // }
		    
// 		});
</script>
@endsection