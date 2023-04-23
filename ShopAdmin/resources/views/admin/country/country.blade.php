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
                    
                                                foreach ($datacountry as $value) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $value->id ?></th>
                                                <td><?php echo $value->name ?></td>
                                                <td>
                                                    <!-- <li>
                                                    <a href="{{ url('/country/edit/'.$value->id) }}">edit</a> -->
                                                    </li>
                                                    <li>
                                                    <a href="{{ url('admin/country/delete/'.$value->id) }}">delete</a>
                                                    </li>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="col-sm-12">
                                        <a href="{{ url('admin/country/add')}}">
                                            <button class="btn btn-success">
                                                Add Blog
                                            </button>
                                        </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 @endsection  