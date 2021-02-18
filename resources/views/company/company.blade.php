@extends('admin.partials.default')



@section('content')


<div class="app-content content">

    <div class="content-overlay"></div>

    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">

            <div class="content-header row">

                <div class="content-header-left col-md-9 col-12 mb-2">

                    <div class="row breadcrumbs-top">

                        <div class="col-12">

                            <h2 class="content-header-title float-left mb-0">Company</h2>

                            <div class="breadcrumb-wrapper col-12">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                    </li>

                                    <li class="breadcrumb-item active">Company

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

                            {{-- <button type="button" class="btn btn-icon btn-primary btn waves-effect waves-light" data-toggle="modal" data-target="{{route('admin.addcompany')}}" title="Add"> --}}

                            <a class="btn  btn-primary" href="{{route('admin.addcompany')}}"> <i class="feather icon-plus"></i> Add New Company </a>

                            <div class="modal fade text-left" id="add_company" data-backdrop="static">

                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">

                                    <div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">

                                         <form class="form-group" action="{{route('admin.companystore')}}" method="POST" enctype="multipart/form-data" id="">

                                            @csrf

                                            <div class="modal-header">

                                                <h4 class="modal-title">Add Company</h4>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                    <span aria-hidden="true">x</span>

                                                </button>

                                            </div>

                                            <div class="modal-body">

                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> First Name :</label>
                                                        <input class="form-control"  name="f_name" placeholder="Person In Charge (First Name)" type="text">
                                                        <span class="text-danger">{{ $errors->first('f_name') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Last Name :</label>
                                                        <input class="form-control"  name="l_name" placeholder="Last Name" type="text">
                                                        <span class="text-danger">{{ $errors->first('l_name') }}</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Company Name :</label>
                                                        <input class="form-control"  name="comp_name" placeholder="Company Name(E.g.ABC SDN.BHD.)" type="text">
                                                        
                                                        <span class="text-danger">{{ $errors->first('comp_name') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Company Registration Number: </label>
                                                        <input class="form-control"  name="comp_reg_no" placeholder="Company Registration Number(E.g. 1234567-w)" type="text">
                                                        <span class="text-danger">{{ $errors->first('comp_reg_no') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Company Adress :</label>
                                                        <textarea class="form-control" id="comp_adress" name="comp_adress" rows="3" placeholder="Company Adress"></textarea>
                                                        <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Post Code :</label>
                                                        <input class="form-control"  name="post_c" placeholder="Post Code" type="text">
                                                        <span class="text-danger">{{ $errors->first('post_c') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> State :</label>
                                                        <input class="form-control"  name="state" placeholder="State" type="text">
                                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Position :</label>
                                                        <input class="form-control"  name="position" placeholder="Position" type="text">
                                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Department :</label>
                                                        <input class="form-control"  name="department" placeholder="Department" type="text">
                                                        <span class="text-danger">{{ $errors->first('department') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Phone No :</label>
                                                        <input class="form-control"  name="cell_no" placeholder="10-000000" type="text">
                                                        <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Email :</label>
                                                        <input class="form-control"  name="email" placeholder="Email" type="email">
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1"> Confirm Email :</label>
                                                        <input class="form-control"  name="con_email" placeholder="Confirm Email" type="email">
                                                        <span class="text-danger">{{ $errors->first('con_email') }}</span>
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

                    </div>

                </div>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                    <th>First Name</th>                                
                                                    <th>Last Name</th>                                
                                                    <th>Company Name</th>                                
                                                    <th>Company registration Number</th>    
                                                    <th>Company Address</th>  
                                                    <th>Postcode</th>                 
                                                    <th>State</th> 
                                                    <th>Region </th>
                                                                                  
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    @foreach($companies as $company)
                                                  <tr>
                                                    <td>{{$company->f_name}}</td>
                                                    <td>{{$company->l_name}}</td>
                                                    <td>{{$company->comp_name}}</td>
                                                    <td>{{$company->comp_reg_no}}</td>
                                                    <td>{{$company->comp_adress}}</td>
                                                    <td>{{$company->post_c}}</td>
                                                    <td>@if(isset($company->state->state))@endif</td>
                                                    <td>@if(isset($company->region->region))@endif</td>
                                                    
                                                    <td>{{$company->email}}</td>
                                                    <td>
                                                        <div>
                                                        <div class="dropdown">

                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <a href="{{route('admin.companyedit',$company->id)}}" class="edit_com pl-1">Edit </a>
                                                            <br> <br>
                                                            {{-- <a href="javascript:void(0)" class="deletebtn pl-1" data-companies_id ="{{$company->id}}" data-toggle="modal" data-target="#destroyModal{{$company->id}}">
                                                                Delete
                                                            </a> --}}

                                                            <a class="dropdown-item" href="{{route('admin.companyshow',$company->id)}}">Details</a>
                                                            </div>
                                                        </div>
                                                            
                                                            
                                                        {{-- Edit modal
                                                            <div class="modal fade" id="editcomp{{$company->id}}" tabindex="-1"       role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Company {{$company->id}}</h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <form action="{{route('admin.companyupdate')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="form">
                                                                                    <input type="hidden" id="company_id"  name="id" value ="{{$company->id}}">
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> First Name :</label>
                                                                                            <input class="form-control"  name="f_name" placeholder="Person In Charge (First Name)" value="{{$company->f_name}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('f_name') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Last Name :</label>
                                                                                            <input class="form-control"  name="l_name" placeholder="Last Name" value="{{$company->l_name}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('l_name') }}</span>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Company Name :</label>
                                                                                            <input class="form-control"  name="comp_name" placeholder="Company Name(E.g.ABC SDN.BHD.)" value="{{$company->comp_name}}" type="text" required>
                                                                                            
                                                                                            <span class="text-danger">{{ $errors->first('comp_name') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Company Registration No: </label>
                                                                                            <input class="form-control"  name="comp_reg_no" placeholder="Company Registration No(E.g. 1234567-w)" value="{{$company->comp_reg_no}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('comp_reg_no') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Company Adress :</label>
                                                                                            <textarea class="form-control" id="comp_adress" name="comp_adress" rows="3" placeholder="Company Adress"  required> {{$company->comp_adress}}</textarea>
                                                                                            <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Post Code :</label>
                                                                                            <input class="form-control"  name="post_c" placeholder="Post Code" value="{{$company->post_c}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('post_c') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> State :</label>
                                                                                            <select class="browser-default custom-select" name="state" id="state" required>
                                                                                            <option selected value="{{$company->state}}" disabled>{{$company->state}}</option>
                                                                                            <option value="East Coast">East Coast</option>
                                                                                            <option value="Southern">Southern</option>
                                                                                            <option value="Northern">Northern</option>
                                                                                            <option value="Central">Central</option>
                                                                                            <option value="Sabah">Sabah</option>
                                                                                            <option value="Sarwak">Sarwak</option>
                                                                                            </select>
                                                                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Region :</label>
                                                                                            <select class="browser-default custom-select" name="region" value="{{$company->region}}id="region">
                                                                                            <option selected value="" disabled>Select Region</option>
                                                                                            <option value="Terengganu">Terengganu</option>
                                                                                            <option value="Pahag">Pahag</option>
                                                                                            <option value="Kelantan">Kelantan</option>
                                                                                            <option value="Melaka">Melaka</option>
                                                                                            <option value="Johor">Johor</option>
                                                                                            <option value="Penang">Penang</option>
                                                                                            <option value="Keddah">Keddah</option>
                                                                                            <option value="Perak">Perak</option>
                                                                                            <option value="Perlis">Perlis</option>
                                                                                            <option value="Selangor">Selangor</option>
                                                                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                                                            <option value="N. Semblin">N. Semblin</option>

                                                                                            </select>
                                                                                            
                                                                                            <span class="text-danger">{{ $errors->first('region') }}</span>
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Position :</label>
                                                                                            <input class="form-control"  name="position" placeholder="Position" value="{{$company->position}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('position') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Department :</label>
                                                                                            <input class="form-control"  name="department" placeholder="Department" value="{{$company->department}}" type="text" required>
                                                                                            <span class="text-danger">{{ $errors->first('department') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Phone No :</label>
                                                                                            <input class="form-control"  name="cell_no" placeholder="10-000000" value="{{$company->cell_no}}" type="number" required>
                                                                                            <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Email :</label>
                                                                                            <input class="form-control"  name="email" placeholder="Email" value="{{$company->email}}" type="email" required>
                                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="mb-1"> Confirm Email :</label>
                                                                                            <input class="form-control"  name="con_email" placeholder="Confirm Email" value="{{$company->email}}" type="email" required>
                                                                                            <span class="text-danger">{{ $errors->first('con_email') }}</span>
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
                                                        </div> --}}

                                                            <!--    Delete modal -->
                                                            <div class="modal fade" id="destroyModal{{$company->id}}" tabindex="-1"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Delete Company  {{$company->f_name}}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <p>Are you sure you want to delete?.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form action="{{route('admin.companydelete')}}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="id" id="delete_id" value="{{$company->id}}">
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

<script>

        window.onload = function() {

        document.getElementById('services').classList.add('active');

        };

    </script>