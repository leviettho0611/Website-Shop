<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="{{ url('/') }}"><img src="{{ asset('frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('blogshop') }}"><i class="fa fa-user"></i> Blog</a></li>
								<li><a class="account" href="{{ url('/shop/account') }}"><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li class="tonghang"><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart
								<span>
									@if (session()->has('cart')) 
						                        
						                <?php
						                    $value=session()->get('cart');
						                    //$value=$value[0];
						                    //echo "<pre>";
						                      //var_dump($value);
						                        		 //dd($value);
						                    ?>

						                            
						                        
						                    @endif
											</span>
										</a></li>
								<li><a href="{{ url('/shop/register') }}"><i class="fa fa-lock"></i> Register</a></li>
								<li><a href="{{ url('/shop/login') }}"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="{{ url('/shop/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('/') }}" class="active">Home</a></li>
								
                                <li><a href="{{ url('/product') }}">Products</a></li>
										
                                </li> 
								<li class="dropdown"><a href="{{ url('/blogshop')}}">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('/blogshop')}}">Blog List</a></li>
										
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
								<li><a href="{{ url('/searchadvanced')}}">Search Avanced</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						
						<form action="{{url('/search')}}"  class="form-inline" >
							@csrf
							<div class="form-group">
								<input type="form-control" name="name" placeholder="Search">
							</div>
							<button class="btn btn-outline-light my-2 my-sm-0 "type="submit">
								Search
							</button>
						</form>
						<!-- <div class="input-group">
						  <div class="form-outline">
						    <input type="search"  class="form-control " placeholder="Search"/>
						    
						  </div>
						  <button type="button" class="btn btn-primary">
						    Search
						  </button>
						</div> -->
						<!-- <div class="search_box pull-right">

							<input type="search" placeholder="Search"/>
							<button type="submit">Search</button>
						</div> -->
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->