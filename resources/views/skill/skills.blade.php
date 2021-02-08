@extends('admin.partials.default')
    @section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h5>Add Skills Type</h5>
                            </div>
                            <div class="card-body">
                                <div class="btn-popup pull-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Skills Type</button>
                                    <!-- Category Modal Start -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Skills Type</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <form class="needs-validation" action="{{route('admin.skillsstore')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1"> Add Skills :</label>
                                                                <input class="form-control"  name="skills_type" placeholder="Add Skills Type" type="text" required>
                                                                <span class="text-danger">{{ $errors->first('skills_type') }}</span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">Save</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Category Modal -->
                                </div>
                            
                            <div class="card-body  table-responsive">
                                <table class="table zero-configuration" id="basic-1">
                                    <thead class="bg-primary text-white">
                                    <tr>
                                        <th>ID</th> 
                                        <th>SKills Type</th> 
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($skills as $skill)

                                        <tr>
                                            <td>{{$skill->id}}</td>
                                            <td>{{$skill->skills_type}}</td>
                                        
                                            <td>
                                            <div>
                                                <a href="javascript:void(0)" class="edit_com" data-news_id = "{{$skill->id}}" data-category_name = "" data-category_image ="" data-toggle="modal" data-target="#editskill{{$skill->id}}"><i class="fa fa-edit mr-2 font-success edit"></i> </a>

                                                <a href="javascript:void(0)" class="deletebtn" data-companies_id ="{{$skill->id}}" data-toggle="modal" data-target="#destroyModal{{$skill->id}}">
                                                <i class="fa fa-trash font-danger"></i>
                                                </a>
                                                
                                            <!-- Edit modal -->
                                                <div class="modal fade" id="editskill{{$skill->id}}" tabindex="-1"       role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Skills {{$skill->id}}</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            </div>
                                                            <form action="{{route('admin.skillupdate')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form">
                                                                        <input type="hidden" id="skill_id"  name="id" value ="{{$skill->id}}" required>
                                                                            <div class="form">
                                                                                <div class="form-group">
                                                                                    <label for="validationCustom01" class="mb-1"> Add Skills :</label>
                                                                                    <input class="form-control"  name="skills_type" value ="{{$skill->skills_type}}" placeholder="Add Skills Type" type="text">
                                                                                    <span class="text-danger">{{ $errors->first('skills_type') }}</span>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--    end Edit modal -->
                                            </div>

                                            <!--    Delete modal -->
                                            <div class="modal fade" id="destroyModal{{$skill->id}}" tabindex="-1"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Delete Company  {{$skill->skills_type}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>Are you sure you want to delete?.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('admin.skilldelete')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" id="delete_id" value="{{$skill->id}}">
                                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                        <hr> 
                                        <tfoot>
                                            <tr>
                                            <th>ID</th> 
                                            <th>SKills Type</th> 
                                            <th>Action</th>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

@endsection()
