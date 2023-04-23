@extends('frontend.layoutfe.mainlayoutnomenuleft');
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>ACCOUNT</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{ url('/shop/account') }}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											ACCOUNT
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{ url('/shop/myproduct') }}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											MY PRODUCT
										</a>
									</h4>
								</div>
								
							</div>
							
							
							
							
						</div><!--/category-products-->
					
						<!--/brands_products-->
						
						<!--/price-range-->
						
						<!--/shipping-->
					
					</div>
				</div>
				<!-- <section id="form"> --><!--form-->
					
						
							
							<div class="col-sm-4">
								<div class="signup-form"><!--sign up form-->
									<h2>USER UPDATE!</h2>
									<form method="POST" class="form-horizontal form-material" action="" enctype="multipart/form-data">
                                   
                                       
                                           @if($errors->any())
                                           <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                   <li> {{$error}}</li>
                                                   @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                    
                                    @csrf 
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?php echo Auth::user()->name; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" value="<?php echo Auth::user()->email;?>" class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" placeholder="phone" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="file" name="avatar"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
								<!--/sign up form-->
							</div>
						</div>
					
				<!-- </section> -->
				<!--features_items-->
					
					<!--/recommended_items-->
					
				
			</div>
		</div>
	</section>
	@endsection 