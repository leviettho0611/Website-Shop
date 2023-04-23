@extends('frontend.layoutfe.mainlayout');
@section('content')
<section id="form">
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4">
					
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						
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
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Login</button>
                                        </div>
                                    </div>
                                </form>
						
					</div><!--/sign up form-->
					
				</div>
				
			</div>
		</div>
</section>
@endsection 