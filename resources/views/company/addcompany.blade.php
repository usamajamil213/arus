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

                        <h2 class="content-header-title float-left mb-0"> Add Company</h2>

                        <div class="breadcrumb-wrapper col-12">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                </li>

                                <li class="breadcrumb-item active">Company

                                </li>
                                <li class="breadcrumb-item active">Add Company

                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <form class="form-group" action="{{route('admin.companystore')}}" method="POST" enctype="multipart/form-data" id="">

            @csrf

            <div class="modal-header">

                <h4 class="modal-title">Add Company</h4>
                    

                </button>

            </div>

            <div class="form">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> First Name :</label>
                            <input class="form-control"  name="f_name" placeholder="Person In Charge" type="text" required>
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Last Name :</label>
                            <input class="form-control"  name="l_name" placeholder="" type="text" required>
                            
                        </div>
                    </div>
                   
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Company Name :</label>
                            <input class="form-control"  name="comp_name" placeholder="Company Name(E.g.ABC SDN.BHD.)" type="text" required>
                            
                            <span class="text-danger">{{ $errors->first('comp_name') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Company Registration Number: </label>
                            <input class="form-control"  name="comp_reg_no" placeholder="Company Registration Number(E.g. 1234567-w)" type="text" required>
                            <span class="text-danger">{{ $errors->first('comp_reg_no') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Company Address :</label>
                            <textarea class="form-control" id="comp_adress" name="comp_adress" rows="3" placeholder="Company Address" required></textarea>
                            <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_c" class="mb-1"> Postcode :</label>
                            <input class="form-control"  name="post_c" placeholder="Post Code" type="number" required maxlength="5">
                            <span class="text-danger">{{ $errors->first('post_c') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Region :</label>
                            <select class="browser-default custom-select" onchange="getStateByRegion(event,this)" name="region" id="region" required>
                                <option selected value="0">Select Region</option>
                                    @foreach ($region as $item)
                                <option value="{{ $item->id }}"->{{ $item->region}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> State :</label>
                            <select class="browser-default custom-select state" name="state" id="state" >
                            <option selected value="" disabled>Select state</option>
                            </select>
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Position :</label>
                            <input class="form-control"  name="position" placeholder="Position" type="text" required>
                            <span class="text-danger">{{ $errors->first('position') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Department :</label>
                            <input class="form-control"  name="department" placeholder="Department" type="text" required>
                            <span class="text-danger">{{ $errors->first('department') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Phone No :</label>
                            <input class="form-control"  name="cell_no" placeholder="10-000000" type="number" required>
                            <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Email :</label>
                            <input class="form-control"  name="email" placeholder="Email" type="email" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Confirm Email :</label>
                            <input class="form-control"  name="con_email" placeholder="Confirm Email" type="email" required>
                            <span class="text-danger">{{ $errors->first('con_email') }}</span>
                        </div>
                    </div>
                                
                </div>

            </div>

            <div class="pull-left">

                <button type="submit" class="btn btn-primary ">Add</button>


            </div>

        </form> 
            
    </div>
</div>

@endsection

