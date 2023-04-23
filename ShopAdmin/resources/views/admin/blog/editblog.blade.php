@extends('admin.layout.mainlayout');
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h1>Create Blog</h1>
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
                        
                        @foreach($dataedit as $value)
                            <div class="form-group">
                                <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="{{ $value['name'] }}"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                        <label class="col-md-12">Image</label>
                                        <div class="col-md-12">
                                            <input type="file" name="image" value="{{ $value['image'] }}"/>
                                        </div>
                                    </div>

                            <div class="form-group">
                                <label class="col-md-12">Desciption</label>
                                    <div class="col-md-12">
                                     <input type="text" name="description" value="{{ $value['description'] }}"/>
                                    </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Content</label>
                                    <textarea name="content" class="form-control" id="editor" > <?php echo $value['content'] ?></textarea>
                            </div>
                        
                            <div class="col-sm-12">
                               
                                            <button class="btn btn-success">
                                                Edit Blog
                                            </button>
                                        
                            </div> 
                            @endforeach
                        </form>  
                        </table>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 @endsection  