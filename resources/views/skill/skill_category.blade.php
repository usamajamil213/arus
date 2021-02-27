@extends('admin.partials.default')



@section('content')

<div class="app-content content">

    <div class="content-wrapper">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-left mb-0">Skill Category</h2>

                        <div class="breadcrumb-wrapper col-12">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                </li>

                                <li class="breadcrumb-item active">Skill Category

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
                    
                                                <button type="button" class="btn btn-icon btn-primary btn waves-effect waves-light" data-toggle="modal" data-target="#add_category" title="Add">
                                                    <i class="feather icon-plus"></i> Add skill category
                                                </button>
                                                    <div class="modal fade text-left" id="add_category" data-backdrop="static">



                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        
                        
                        
                                                            <div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">
                        
                        
                        
                                                                 <form class="form-group" action="{{route('admin.skillscategorystore')}}" method="POST" enctype="multipart/form-data" id="">
                        
                        
                        
                                                                    @csrf
                        
                        
                        
                                                                    <div class="modal-header">
                        
                        
                        
                                                                        <h4 class="modal-title">Add  Skill category</h4>
                        
                        
                        
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                        
                        
                                                                            <span aria-hidden="true">x</span>
                        
                        
                        
                                                                        </button>
                        
                        
                        
                                                                    </div>
                        
                        
                        
                                                                    <div class="modal-body">
                        
                        
                        
                                                                        <div class="data-items pb-3">
                        
                        
                        
                                                                            <div class="data-fields px-2 mt-12">
                        
                        
                        
                                                                                <div class="row col-12">
                        
                        
                        
                                                                                    <div class="col-sm-12 data-field">
                        
                        
                        
                                                                                        <label for="cat_name">Category Name</label>
                        
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="col-sm-12 data-field">
                                                                                        <input name="name" type="text" class="form-control" id="name" required>
                        
                        
                        
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
                    
                                        <div class="table-responsive table-sm">
                                            <table class="table zero-configuration table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>id</th> 
                                                       <th>Category Name</th> 
                                                       <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    @foreach($skill_category as $category)
                                                    <tr>
                                                        <td>{{$category->id}}</td>
                                                        <td>{{$category->name}}</td>
                    
                                                        <td>
                                                             
                                                            
                                                        </td>

                                                    </tr>

                                                    @endforeach

                                                </tbody>

                                                

                                            </table>
                                            {{$skill_category->links()}}
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