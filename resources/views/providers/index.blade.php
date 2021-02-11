@extends('admin.partials.default')



@section('content')

<div class="app-content content">

    <div class="content-wrapper">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-left mb-0">Providers</h2>

                        <div class="breadcrumb-wrapper col-12">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                </li>

                                <li class="breadcrumb-item active">Providers

                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="content-body">

            <!-- Zero configuration table -->

            <section id="basic-datatable">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-content">

                                <div class="card-body card-dashboard">

                                    <div class="content-header-right col-md-12 col-12 mb-2">
                                        <div class="row">

                                            <div class="col-12 text-right">
                    
                                                <button type="button" class="btn btn-icon btn-primary btn waves-effect waves-light" data-toggle="modal" data-target="#add_provider" title="Add">
                                                    <i class="feather icon-plus"></i> Add Provider
                                                </button>
                                                    <div class="modal fade text-left" id="add_provider" data-backdrop="static">



                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                        
                        
                        
                                                            <div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">
                        
                        
                        
                                                                 <form class="form-group" action="" method="POST" enctype="multipart/form-data" id="">
                        
                        
                        
                                                                    @csrf
                        
                        
                        
                                                                    <div class="modal-header">
                        
                        
                        
                                                                        <h4 class="modal-title">Add User</h4>
                        
                        
                        
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                        
                        
                                                                            <span aria-hidden="true">x</span>
                        
                        
                        
                                                                        </button>
                        
                        
                        
                                                                    </div>
                        
                        
                        
                                                                    <div class="modal-body">
                        
                        
                        
                                                                        <div class="data-items pb-3">
                        
                        
                        
                                                                            <div class="data-fields px-2 mt-12">
                        
                        
                        
                                                                                <div class="row col-12">
                        
                        
                        
                                                                                    <div class="col-sm-6 data-field">
                        
                        
                        
                                                                                        <label for="cat_name">First Name</label>
                        
                        
                        
                                                                                        <input name="name" type="text" class="form-control" id="name" required>
                        
                        
                        
                                                                                    </div>
                                                                                    <div class="col-sm-6 data-field">
                        
                        
                        
                                                                                        <label for="name">Last Name</label>
                        
                        
                        
                                                                                        <input name="L_name" type="text" class="form-control" id="name" required>
                        
                        
                        
                                                                                    </div>
                                                                                    <div class="col-sm-6 data-field">
                        
                        
                        
                                                                                        <label for="name">Email</label>
                        
                        
                        
                                                                                        <input name="email" type="email" class="form-control" id="name" required>
                        
                        
                        
                                                                                    </div>
                                                                                    <div class="col-sm-6 data-field">
                        
                        
                        
                                                                                        <label for="name">Phone No</label>
                        
                        
                        
                                                                                        <input name="phone" type="text" class="form-control" id="name" required>
                        
                        
                        
                                                                                    </div>
                                                                                    <div class="col-sm-6 data-field">

                                                                                        <label for="platform_fee_percent">Address</label>
                        
                                                                                        <textarea class="form-control" aria-label="With textarea" name="address"></textarea>
                        
                                                                                    </div>
                                                                                    <div class="col-sm-6 data-field">
                        
                        
                        
                                                                                        <label for="name">Password</label>
                        
                        
                        
                                                                                        <input name="password" type="password" class="form-control" id="name" required>
                        
                        
                        
                                                                                    </div>
    
                        
                        
                                                                             
                        
                        
                        
                                                                                </div>
                        
                        
                        
                                                                            </div>
                        
                        
                        
                                                                        </div>
                        
                        
                        
                                                                    </div>
                        
                        
                        
                                                                    <div class="modal-footer">
                        
                        
                        
                                                                        <button type="submit" class="btn btn-primary">Add</button>
                        
                        
                        
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        
                        
                        
                                                                    </div>
                        
                        
                        
                                                               </form> 
                        
                        
                        
                                                            </div><!-- /.modal-content -->
                        
                        
                        
                                                        </div><!-- /.modal-dialog -->
                        
                    
                                   
                    
                                            </div>
                    
                                        </div>
                    
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th> 
                                                        <th>Email</th> 
                                                        <th>Phone</th>                                
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    @foreach($providers as $provider)
                                                    <tr>
                                                        <td>{{$provider->name}}</td>
                                                        <td>{{$provider->email}}</td>
                                                        <td>{{$provider->phone}}</td>
                                                        <td>
                                                            <div class="dropdown">

                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
                                                                <a href="{{route('admin.provideredit',$provider->id)}}" class="edit_com pl-1">Edit </a>
                                                                <br> <br>
                                                                <a href="javascript:void(0)" class="deletebtn pl-1" data-companies_id =" " data-toggle="modal" data-target="#destroyModal">
                                                                    Delete
                                                                </a>
    
                                                                <a class="dropdown-item" href="">Details</a>
                                                                </div>
                                                            
                                       
                                                        </td>

                                                    </tr>

                                                    @endforeach

                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th> 
                                                        <th>Email</th> 
                                                        <th>Phone</th>                                
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

                <!--/ Zero configuration table -->
            </div>
        </div>
    </div>

    @endsection