@extends('frontend.layoutfe.mainlayout');
@section('content')
<div class="col-sm-9">
                    <div class="blog-post-area">
                        
                    <h2 class="title text-center">Latest From our Blog</h2>
                            @foreach ($datablogshopdetail as $value) 
                        
                        
                        <div class="single-blog-post">
                            <h3><?php echo $value->name ?></h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> Mac Doe</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                </ul>
                                <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                </span>
                            </div>
                            <a href="">
                                <img src="{{url('admin/image/'.$value->image)}}" >
                            </a>
                            <p><?php echo $value->description ?></p>
                            <a  class="btn btn-primary" href="{{url('blogshop/detail/'.$value->id)}}">Read More</a>
                        </div>
                        
                        
                        @endforeach
                    </div>
                    {{$datablogshopdetail->links()}}
                    <!-- <div class="pagination-area">
                            <ul class="pagination">
                                <li><a href="" class="active">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div> -->

                </div>
<!-- <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Description</th>
                                                <!- <th scope="col">Rate</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                
                                                 <th scope="row"><?php //echo $value->id ?></th> 
                                                 <td><?php //echo $value->name ?></td>
                                                 <td><?php //echo $value->image ?></td>
                                                 <td><?php //echo $value->description ?></td>
                                                 <td>
                                                    <li>
                                                    <a href="{{ url('/blog/edit/') }}">edit</a>
                                                    </li>
                                                    <li>
                                                    <a href="{{ url('/blog/delete/') }}">delete</a>
                                                    </li>
                                                </td>
                                            </tr>
                                            
                                    </table>
                                </div> -->
                                
 @endsection 