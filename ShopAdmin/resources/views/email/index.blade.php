<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
        	div.demo {
        		width: 50px;
        		height: 50px;
        		display: inline-block;
        		
        	}
        	table {
        		max-width: 100%;
    			background-color: transparent;
        	}
        	thead {
        		    display: table-header-group;
				    vertical-align: middle;
				    border-color: inherit;
        	}
        	tbody {
        			display: table-row-group;
				    vertical-align: middle;
				    border-color: inherit;
        	}
        </style>
	<title>Le Viet Tho Email Send</title>
</head>
<body>
	<div class="demo"></div>
	<h3>Delivery Email leviettho0611@gmail.com</h3>
	
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
			
			 	 
			       $session=$data['body'];
			      
			       foreach($session as $value){
			       	
			     ?>
			
				
		
			<tr>
				<td class="cart_product">

					<?php
					$getArrImage = json_decode($value['image'], true);
                    	 //dd($getArrImage[0]);
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
							// // echo $_SESSION['cart'][$key]['price'];
							// $tien=chop($_SESSION['cart'][$key]['price'],'$');
							// // echo $tien;
							// $getqty=$_SESSION['cart'][$key]['qty'];
							// // echo $getqty;
							// $tong=$tien * $getqty;
							// echo $tong;
						

						?>
					</p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
				</td>
			</tr>
				<?php
					} 
			
				?>
						
		</tbody>
	</table>
</body>
</html>