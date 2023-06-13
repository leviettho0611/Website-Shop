@extends('frontend.layoutfe.mainlayout');
@section('content')

<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						
						<div class="single-blog-post">
							<h3><?php echo $dataedit['name'] ?></h3>
							<h3><?php echo $dataedit['id'] ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							<a href="">
								<img src="{{url('admin/image/'.$dataedit['image'])}}" alt="">
							</a>
							<p>
								<?php echo $dataedit['description'] ?></p> <br>

							
							<!-- <div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div> -->
						</div>
						
					</div><!--/blog-post-area-->
					
			    	
					 <div class="rating-area">
						<ul class="ratings">
							
							<li class="rate-this">Rate this item:</li>
							@for($i=1;$i<=5;$i++)
							
								
								@if($i<=$roundrate)
									<i class="fa fa-star color"></i>
								
								
								@else
									<i class="fa fa-star "></i>
								
								@endif
							
							@endfor
							<?php echo $roundrate ?>
						</ul>

						<ul class="color"><p>-Vote(<?php echo $countrate ?>)</p></ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>

						</ul>
					</div> <!--/rating-area-->
					
					<div class="socials-share">
						<a href=""><img src="{{ asset('frontend/images/blog/socials.png')}}" alt=""></a>
					</div> <!--/socials-share-->

					 <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{ asset('frontend/images/blog/man-one.jpg')}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> <!--Comments-->
					 <div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							 @foreach ($datacomment as $value)
								@if($value->level==0)
								
								
								<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{url('frontend/avatar/'.$value->image)}}" alt="" width="150px">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i><?php echo $value->name?></li>
											<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
											<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
										</ul>
										<p><?php echo $value->comment;?></p>
										
										<a id="<?php echo $value->id?>" class="btn btn-primary xx" href="#cmt" ><i class="fa fa-reply"></i>
											Replay</a>
									</div>
								</li>
								
								@endif
								@foreach ($datacomment as $value2)

								@if($value2->level==$value->id)
									<!-- level = id cha{ -->
										<li class="media second-media">
											<a class="pull-left" href="#">
												<img class="media-object" src="{{url('frontend/avatar/'.$value->image)}}" alt="" width="150px">
											</a>
											<div class="media-body">
												<ul class="sinlge-post-meta">
													<li><i class="fa fa-user"></i><?php echo $value2->name?></li>
													<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
													<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
												</ul>
												<p><?php echo $value2->comment;?></p>
												<a class="btn btn-primary xx" href=""><i class="fa fa-reply"></i>Replay</a>
											</div>
										</li>
									
								@endif
								@endforeach	
							@endforeach
							<!-- <li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="{{ asset('frontend/images/blog/man-four.jpg')}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> -->
							<!-- <li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="{{ asset('frontend/images/blog/man-three.jpg')}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> -->
							
						</ul>					
					</div><!--/Response-area-->
					 <div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								
								<form method="POST" id="cmt"  class="form-horizontal form-material" action="{{url('/blogshop/comment/'.$dataedit['id'])}}" enctype="multipart/form-data">
									@csrf
									
								<div class="text-area">
									<div class="blank-arrow">
										<label>Comment</label>
									</div>
									<span>*</span>
									<input class="levelinput" name="level" type="hidden" value="0">
									<textarea  name="comment" rows="11" ></textarea>
									<button type="submit" class="btn btn-primary" >post comment</button>
								</div>
								
									</form> 
									
							</div>
						</div> 
					</div><!--/Repaly Box-->
				</div>
				<h2>Vote here:</h2>
				@csrf
				

				<div class="rate">
                <div class="vote">
                	
                    <div class="star_1 ratings_stars"><input id="<?php echo $dataedit['id'] ?>" value="1" type="hidden"></div>
                    <div class="star_2 ratings_stars"><input id="<?php echo $dataedit['id'] ?>" value="2" type="hidden"></div>
                    <div class="star_3 ratings_stars"><input id="<?php echo $dataedit['id'] ?>" value="3" type="hidden"></div>
                    <div class="star_4 ratings_stars"><input id="<?php echo $dataedit['id'] ?>" value="4" type="hidden"></div>
                    <div class="star_5 ratings_stars"><input id="<?php echo $dataedit['id'] ?>" value="5" type="hidden"></div>
                    <!-- <span class="rate-np">4.5</span> -->
                </div> 
            </div>
            
           
				 
@endsection 
@section('js')

 <script>
    	
			 $(document).ready(function(){
				//vote
				$('.ratings_stars').hover(
		            // Handles the mouseover
		            function() {
		                $(this).prevAll().andSelf().addClass('ratings_hover');
		                // $(this).nextAll().removeClass('ratings_vote'); 
		            },
		            function() {
		                $(this).prevAll().andSelf().removeClass('ratings_hover');
		                // set_votes($(this).parent());
		            }
		        );

				$('.ratings_stars').click(function(){
					var Values =  $(this).find("input").val();
					//alert(Values);
					var Valuesid =  $(this).find("input").attr('id');
			        //alert(Valuesid);
			       
			        var checklogin= "{{Auth::check()}}";
			        
			        //alert(authid);
			        //alert(checklogin);
			        if(checklogin){
			        	alert('da dang nhap');
						if ($(this).hasClass('ratings_over')) {
				        $('.ratings_stars').removeClass('ratings_over');
				        $(this).prevAll().andSelf().addClass('ratings_over');
					    } else {
					        $(this).prevAll().andSelf().addClass('ratings_over');
					    }
					    $.ajaxSetup({
							headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						    $.ajax({
		                    type: 'POST',
		                    url: "{{ url('/blogshop/rate') }}",
		                    data: {
		                        'rate': Values,
	        					'id_blog': Valuesid,
		                    },
		                    success:function(data){
		                    	console.log(data);
		                        // $('tbody').html(data);
		                    }

		                });
						    
				    //ajax  va truyen 3 du lieu qua 
				    }else{
				        alert('chua dang nhap');
				    }
				    //$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
			    	
			    });
			});
		    </script>
		    <script>
		    	$(document).ready(function(){
		    		$('.xx').click(function(){
		    			var id =$(this).attr('id');
		    			console.log(id);
		    			$(".levelinput").val(id);
		    			
		    			
			    		})
			    	});	
			    	$('form').submit(function () {
			    		 // e.preventDefault();
			    		var checklogin= "{{Auth::check()}}";
			    		var values = $("textarea").val();
			    		// var id = $dataedit['id'];
			    		
			    		// alert(id);
			    		alert(values); 
			    		 if(checklogin){
			    		 	 alert('dang nhap thanh cong');
			    		 	 if (values ==" ") {
			    		 	 	alert('vui long nhap');
			    		 	 	
			    		 	 }else{
			    		 	 	alert('da nhap');
			    		 	 	return true;
			    		 	 }
			    		 	 return false;
			    		
			    		 }else{
			    		 	 alert('vui long dang nhap');
			    		 	return false;
			    		 }
			    		  //return false;
			    	})
			    	
		    	
		    		    	
		    		
		    </script>
@endsection 
