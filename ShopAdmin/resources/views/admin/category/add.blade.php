@extends('admin.layout.mainlayout');
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h1>Create Category</h1>
                        <!-- <tr>
                                    <th scope="col">Create Blog</th>
                                    
                                    </tr> -->
                        <table class="table">
                            
                        
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
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                        
                            <div class="col-sm-12">
                                <button class="btn btn-success">Add Category</button>
                            </div> 
                        </form>  
                        </table>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 @endsection  