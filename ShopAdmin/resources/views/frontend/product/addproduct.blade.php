@extends('frontend.layoutfe.mainlayoutnomenuleft');
@section('content')
<section id="form">
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
				<div class="col-sm-4">
					
					<div class="signup-form"><!--sign up form-->
						<h2>Create Product!</h2>
						
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
                                    <div class="form-group" >
                                        
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="Name" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-md-12">
                                            <input type="text" name="price" value="Price" class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            
                                            <select name="id_category" class="form-control form-control-line">
                                                <option value="">vui long chon Category</option>

                    
                                                    @foreach ($datacategory1 as $value) {
                                                 
                                                <option value="{{$value->id}}" {{ $User['id_country'] == $value->id ? 'selected' : ""}} >{{$value->name}} </option>
                                                	@endforeach
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            
                                            <select name="id_brand" class="form-control form-control-line">
                                                <option value="">vui long chon Brand</option>
                                                <?php
                    
                                                        foreach ($databrand1 as $value) {
                                                    ?>
                                                <option value="{{$value->id}}" {{ $User['id_country'] == $value->id ? 'selected' : ""}} >{{$value->name}}</option>
                                                <?php  } ?>
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            
                                            <select name="id_sale" id="status" class="form-control form-control-line">
                                                
                                                @foreach ($datasale1 as $value) 
                                                 
                                                <option  value="{{$value->id}}" >{{$value->name}} 
                                                </option>
                                                @endforeach
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div id="hide" class="form-group"  >
                                        
                                        <div class="col-md-10" >
                                            <input class="saledetail" name="sale" value="0" class="form-control form-control-line">
                                            %
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        
                                        <div class="col-md-12">
                                            <input type="text" name="company" value="Company" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    
                                        
                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            <input type="file" name="image[]" multiple/>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group" >
                                        
                                        <div class="col-md-12">
                                            <input type="text" name="detail" value="Detail" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Create</button>
                                        </div>
                                    </div>
                                </form>
						
					</div><!--/sign up form-->
					
				</div>
				
			</div>
		</div>
</section>
@endsection 
@section('js')
 <script>
     $(document).ready(function () {
        $("#hide").hide();
            $("#status").change(function(){
                $("#hide").show();
                var check =$(this).val();
                console.log(check);
                if(check==2){
                    $('.saledetail').show();
                }else{
                    $('.saledetail').hide();
                }
                
            })
        });
 </script> 
 @endsection  