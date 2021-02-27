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

                            <h2 class="content-header-title float-left mb-0"> Edit Company</h2>

                            <div class="breadcrumb-wrapper col-12">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                    </li>

                                    <li class="breadcrumb-item active">Company

                                    </li>
                                    <li class="breadcrumb-item active"> Edit Company

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
                               
                    <form action="{{route('admin.companyupdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">

                                <input type="hidden" id="company_id"  name="id" value ="{{$company->id}}">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> First Name :</label>
                                        <input class="form-control"  name="f_name" placeholder="Person In Charge" value="{{$company->f_name}}" type="text" required>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Last Name :</label>
                                        <input class="form-control"  name="l_name" placeholder="" value="{{$company->l_name}}" type="text" required>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Company Name :</label>
                                        <input class="form-control"  name="comp_name" placeholder="Company Name(E.g.ABC SDN.BHD.)" value="{{$company->comp_name}}" type="text" required>
                                        <span class="text-danger">{{ $errors->first('comp_name') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Company Registration Number: </label>
                                        <input class="form-control"  name="comp_reg_no" placeholder="Company Registration No(E.g. 1234567-w)" value="{{$company->comp_reg_no}}" type="text" required>
                                        <span class="text-danger">{{ $errors->first('comp_reg_no') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Company Address :</label>
                                        <textarea class="form-control" id="comp_adress" name="comp_adress" rows="3" placeholder="Company Adress"  required> {{$company->comp_adress}}</textarea>
                                        <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Postcode :</label>
                                        <input class="form-control"  name="post_c" placeholder="Post Code" value="{{$company->post_c}}" type="text" required>
                                        <span class="text-danger">{{ $errors->first('post_c') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Region :</label>
                                        <select class="form-control custom-select" onchange="getStateByRegion(event,this)" name="region" id="region" required>
                                            <option  value="">Select Region</option>
                                                @foreach ($region as $item)
                                                <option value="{{ $item->id }}" @if($company->region_id == $item->id) selected @endif>{{ $item->region}}</option>
                                                @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('region') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> State :</label>
                                        <select class="form-control custom-select state" name="state" id="state" >
                                            <option selected value="{{$company->state_id}}" >{{$company->state->state}}</option>
                                        </select>
                                        
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Position :</label>
                                        <input class="form-control"  name="position" placeholder="Position" value="{{$company->position}}" type="text" required>
                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Added by :</label>
                                        <select class="browser-default custom-select"  name="added_by"  required>
                                       
                                            <option value="user"  >User</option>   
                                        
                                            <option value="provider">Provider</option>
                                             
                                        
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Department :</label>
                                        <input class="form-control"  name="department" placeholder="Department" value="{{$company->department}}" type="text" required>
                                        <span class="text-danger">{{ $errors->first('department') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Phone Number :</label>
                                        <input class="form-control"  name="cell_no" placeholder="10-000000" value="{{$company->cell_no}}" type="number" required>
                                        <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Email :</label>
                                        <input class="form-control"  name="email" placeholder="Email" value="{{$company->email}}" type="email" required>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Confirm Email :</label>
                                        <input class="form-control"  name="con_email" placeholder="Confirm Email" value="{{$company->email}}" type="email" required>
                                        <span class="text-danger">{{ $errors->first('con_email') }}</span>
                                    </div>
                                </div>

                            </div>


                                <div class="">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                        </div>

                    </form>
                

                </section>

                <!--/ Zero configuration table -->
            </div>
    </div>
</div>


@endsection


<!--    end Edit modal -->