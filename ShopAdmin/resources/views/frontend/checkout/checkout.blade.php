@extends('frontend.layoutfe.mainlayoutnomenuleft');
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						if (session()->has('cart')){
						 	 
						       $session=session()->get('cart');
						       // $session=$session[0];
						       // echo '<pre>';
						       //  var_dump($session);
						       foreach($session as $value){
						       	//dd($value);
		                            
								//dd($value['id']) ;
						      
                       			// echo '<pre>';
		                        //   var_dump($session);
						     ?>
						<tr>
							<td class="cart_product">

								<?php
								$getArrImage = json_decode($value['image'], true);
		                        	// dd($getArrImage[0]);
								?>
								<a><img src="{{url('frontend/imageproduct/'.$getArrImage[0])}}"width=200></a>
							</td>
							<td class="cart_description">
								<h4><a>
									<?php
										echo $value['name'];
										
									?>
										
								</a></h4>
								
								<i id="<?php echo $value['id'];?>">
									<?php
										echo $value['id'];
										
									?>
								</i>
							</td>
							<td class="cart_price">
								<p>
									<?php
										echo $value['price'];
									?>
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['qty'];?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" > - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									//echo "<pre>";
										//var_dump($value['qty']);
										$tien=chop($value['price'],'$');
										//echo $tien;
										$qty=$value['qty'];
										//echo $qty;
										$tong=$tien * $qty;
										echo $tong
										
									

									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						<?php
										} 
									}
									?>
									<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td class="totalxuat">
										<span>
											<?php
											$sum=0;
											if (session()->has('cart')){
									 	 
									       		$session1=session()->get('cart');
									       		foreach($session1 as $value)
									       		{
									       			//echo '<pre>';
									       			$tien1=chop($value['price'],'$');
									       			//echo $tien;
									       			$qty1=$value['qty'];
									       			//echo $qty;
									       			$tong1=$tien1 * $qty1;
									       			//echo $tong1;
									       			$sum=$sum+$tong1;
									       			
									       		}
									       		//echo $sum;
									   		}
									   		echo $sum;

										?>
										
										</span>
										</td>
									</tr>
									
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td class="totalxuat"><span>
											<?php
											$sum=0;
											if (session()->has('cart')){
									 	 
									       		$session1=session()->get('cart');
									       		foreach($session1 as $value)
									       		{
									       			//echo '<pre>';
									       			$tien1=chop($value['price'],'$');
									       			//echo $tien;
									       			$qty1=$value['qty'];
									       			//echo $qty;
									       			$tong1=$tien1 * $qty1;
									       			//echo $tong1;
									       			$sum=$sum+$tong1;
									       			
									       		}
									       		//echo $sum;
									   		}
									   		echo $sum;
										?>

										</span>
									
								</td>
									</tr>
									
								</table>
								<a class="btn btn-primary xx" href="{{ url('/send') }}">Order</a>
							</td>
						</tr>
					</tbody>

				</table>
			</div>
			<div class="shopper-informations">
				<div class="row">
					
					
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<div id="hide" class="form-group"  >
						<form class="form" method="POST" class="form-horizontal form-material" action="" enctype="multipart/form-data">
                                   
                                       
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
                                            <input type="text" name="name" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" value="" class="form-control form-control-line" name="example-email" id="example-email">
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
                                            <textarea name="address" rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="file" name="avatar"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
						
					</div><!--/sign up form-->
					
									
				</div>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
@section('js')
<script>
			$(document).ready(function(){
				$("#hide").hide();
				$('.xx').click(function(){
					var checklogin= "{{Auth::check()}}";
					console.log(checklogin);
					if(checklogin)
					{
						//alert('da dang nhap');
						
					}
					else
					{
						alert('vui long dang nhap hoac chua dang ky');
						//$(this).addclass('form');
						$("#hide").show();
						return false;
						
					}
					
				})
				$("a.cart_quantity_up").click(function () {
    		var getID1 = $(this).closest("tr").find("td.cart_description").find("i").attr("id");
    							 //console.log(getID1);
    							 $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
	    							$.ajax({
									method: "POST",
									url: "{{ url('/ajaxcart1') }}",
									data: {
										'getID1': getID1,
										'x':1,
									},
									success : function(res1){
										console.log(res1.success);
										
									}
								});
				// lay qty
				var xx1 = $(this).closest("div.cart_quantity_button").find("input").val()
				// alert(xx1)
				var yy1 = parseInt(xx1) + 1;
				//xuat qty moi
				$(this).closest("div.cart_quantity_button").find("input").val(yy1)
				//lay id
				var id1 = $(this).closest("tr").find("td.cart_description").find("i").text()
				// console.log(id1)
				//lay price
				var price1 = $(this).closest("tr").find("td.cart_price").find("p").text()
				// console.log(price1)
				var xoa1 = price1.replace('$', '');
				// console.log(xoa1)
				var total1 = xoa1 * yy1;
				// console.log(total1)
				// xuat price moi
				$(this).closest("tr").find("p.cart_total_price").text(total1)
				var objcon = localStorage.getItem("viettho")
				
				if (objcon) {
					objcha = JSON.parse(objcon)
					//console.log(objcha)
					Object.keys(objcha).map(function (key, index) {
						// console.log(id1)
						// console.log(key)
						if (id1 == key) {
							// console.log(1111)
							

							objcha[key]["qty"] += 1;
							// console.log(total1)

							// console.log(total11)
						}
					})
					// console.log(objcha)

				}

				localStorage.setItem("viettho", JSON.stringify(objcha))
				var totalsau1 = $(".totalxuat").find("span").text()
				var total11 = parseInt(totalsau1) + parseInt(xoa1);
				 // console.log(total11)
				$(".totalxuat").find("span").text(total11)
				
			})
				$("a.cart_quantity_down").click(function () {
				var getID1 = $(this).closest("tr").find("td.cart_description").find("i").attr("id");
    							// console.log(getID1);
									$.ajaxSetup({
	                                headers: {
	                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                                    }
	                                });
	    							$.ajax({
									method: "POST",
									url: "{{ url('/ajaxcart1') }}",
									data: {
										'getID1': getID1,
										'x':2,
									},
									success : function(res1){
										console.log(res1.success);
									}
								});
				//lay qty
				var xx2 = $(this).closest("div.cart_quantity_button").find("input").val()
				// alert(xx2)
				var yy2 = parseInt(xx2) - 1;
				if (yy2 < 1) {
					$(this).closest("tr").remove();
					var id2 = $(this).closest("tr").find("td.cart_description").find("i").text()
					var objcon = localStorage.getItem("viettho")
					if (objcon) {
						objcha = JSON.parse(objcon)
						Object.keys(objcha).map(function (key, index) {
							if (id2 == key) {

								delete objcha[key];

							}
						})
					}
					// console.log(objcha)
					var tru = $(".totalxuat").find("span").text()
					var price3 = $(this).closest("tr").find(".cart_price").find("p").text()
					var xoa3 = price3.replace('$', '')
					var tru1 = tru - parseInt(xoa3);
					$(".totalxuat").find("span").text(tru1)
					localStorage.setItem("viettho", JSON.stringify(objcha))

				} else {
					// var yy2 = parseInt(xx2) - 1;
					$(this).closest("div.cart_quantity_button").find("input").val(yy2)
					//lay id
					var id3 = $(this).closest("tr").find("td.cart_description").find("i").text()
					// console.log(id2)
					//lay price
					var price2 = $(this).closest("tr").find(".cart_price").find("p").text()
					// console.log(price2)
					var xoa2 = price2.replace('$', '')
					var total2 = xoa2 * yy2
					// xuat price moi
					$(this).closest("tr").find("p.cart_total_price").text(total2)
					// console.log(total2)
					var objcon = localStorage.getItem("viettho")
					if (objcon) {
						objcha = JSON.parse(objcon)
						Object.keys(objcha).map(function (key, index) {
							if (id3 == key) {

								objcha[key]["qty"] -= 1;

								// console.log(total22)
							}
						})
					}
					// console.log(objcha)
					var totalsau2 = $(".totalxuat").find("span").text()
					var total22 = parseInt(totalsau2) - parseInt(xoa2);
					// console.log(total22)
					$(".totalxuat").find("span").text(total22)
					
					localStorage.setItem("viettho", JSON.stringify(objcha))
				}

			})
			$("a.cart_quantity_delete").click(function () {
				var getID1 = $(this).closest("tr").find("td.cart_description").find("i").attr("id");
    							// console.log(getID2);
									$.ajaxSetup({
	                                headers: {
	                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                                    }
	                                });
	    							$.ajax({
									method: "POST",
									url: "{{ url('/ajaxcart1') }}",
									data: {
										'getID1': getID1,
										'x':3,
									},
									success : function(res1){
										console.log(res1.success);
									}
								});
				$(this).closest("tr").remove();
				var id4 = $(this).closest("tr").find("td.cart_description").find("i").text()
				var objcon = localStorage.getItem("viettho4")
				if (objcon) {
					objcha = JSON.parse(objcon)
					Object.keys(objcha).map(function (key, index) {
						if (id4 == key) {
							delete objcha[key];
						}
					})
				}
				// console.log(objcha)
				var tru1 = $(".totalxuat").find("span").text()
				var tong1 = $(this).closest("tr").find(".cart_total").find("p").text()
				var delete1= tru1 - tong1;
				$(".totalxuat").find("span").text(delete1)
				localStorage.setItem("viettho4", JSON.stringify(objcha))
			})
			});
</script>
@endsection