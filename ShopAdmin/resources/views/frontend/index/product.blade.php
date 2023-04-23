
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
					</div>
				</div>
				<!-- <section id="form"> --><!--form-->
						
				<section id="cart_items">
						<div class="container">
							<div class="col-sm-9 padding-right">
							
							<!-- <div class="breadcrumbs">
								<ol class="breadcrumb">
								  <li><a href="#">Home</a></li>
								  <li class="active">Shopping Cart</li>
								</ol>
							</div> -->
							<div class="table-responsive cart_info">
								<table class="table table-condensed">
									<thead>
										<tr class="cart_menu">
											<td class="id">ID</td>
											<td class="name">Name</td>
											<td class="image">image</td>
											<td class="price">Price</td>
											<td class="action">Action</td>
											<td></td>
										</tr>
									</thead>
									<tbody>
										
										@foreach($product as $value)
										<?php
										$getArrImage = json_decode($value['image'], true);
										//echo "<pre>";
										//var_dump($getArrImage);
										?>
										<tr>
											<td class="cart_id">
												<p><?php echo $value->id ?></p>
											</td>
											<td class="cart_name">
												<!-- <h4><a href=""></a>name</h4> -->
												<p><?php echo $value->name ?></p>
											</td>
											<td class="cart_product">
												<img src="{{url('frontend/imageproduct/'.$getArrImage[0])}}" alt=" "width="100px"/>
											</td>
											
											<td class="cart_price">
												<p><?php echo $value->price?></p>
											</td>
											<!-- <td class="cart_sale">
												<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i><?php //echo $getProduct['price'] ?></a>
											</td> -->
											<td class="cart_edit">
												<a class="cart_quantity_delete" href="{{ url('/productdetail/'.$value->id) }}"><i class="fa fa-times"></i> detail </a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<a href="{{ url('/shop/addproduct') }}">
									<div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">ADD PRODUCT</button>
                                        </div>
                                    </div>
							</div>
							</div>
							</div>
						</div>
						
					</section>
				<!-- </section> -->
				<!--features_items-->
					
					<!--/recommended_items-->
					
				
			</div>
		</div>
	</section>
	
@endsection 