@extends('admin.layout.mainlayout');
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    
                                                foreach ($datacategory as $value) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $value->id ?></th>
                                                <td><?php echo $value->name ?></td>
                                                <td>
                                                    <li>
                                                    <a href="{{ url('admin/category/delete/'.$value->id) }}">delete</a>
                                                    </li>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="col-sm-12">
                                        <a href="{{ url('admin/category/add')}}">
                                            <button class="btn btn-success">
                                                Add Category
                                            </button>
                                        </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 @endsection  