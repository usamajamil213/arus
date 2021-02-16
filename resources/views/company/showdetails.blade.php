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

                                    <li class="breadcrumb-item active">Company Details
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
                    <div class="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> First Name :</label>
                                    <input class="form-control"  name="f_name" placeholder="Person In Charge (First Name)" value="{{$company->f_name}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('f_name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Last Name :</label>
                                    <input class="form-control"  name="l_name" placeholder="Last Name" value="{{$company->l_name}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('l_name') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Company Name :</label>
                                    <input class="form-control"  name="comp_name" placeholder="Company Name(E.g.ABC SDN.BHD.)" value="{{$company->comp_name}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('comp_name') }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Company Registration Number: </label>
                                    <input class="form-control"  name="comp_reg_no" placeholder="Company Registration Number(E.g. 1234567-w)" value="{{$company->comp_reg_no}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('comp_reg_no') }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Company Adress :</label>
                                    <textarea class="form-control" id="comp_adress" name="comp_adress" rows="3" placeholder="Company Adress"  readonly> {{$company->comp_adress}}</textarea>
                                    <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Post Code :</label>
                                    <input class="form-control"  name="post_c" placeholder="Post Code" value="{{$company->post_c}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('post_c') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1"> Region :</label>
                                        <select class="form-control custom-select" onchange="getStateByRegion(event,this)" name="region" id="region" readonly>
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
                                        <select class="form-control custom-select state" name="state" id="state" readonly>
                                            <option selected value="{{$company->state_id}}" >{{$company->state->state}}</option>
                                        </select>
                                        
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    </div>
                                </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> State :</label>
                                    <select class="browser-default custom-select" name="state" value="{{$company->State}}" id="state" readonly>
                                    <option selected value="" disabled>Select</option>
                                    <option value="East Coast">East Coast</option>
                                    <option value="Southern">Southern</option>
                                    <option value="Northern">Northern</option>
                                    <option value="Central">Central</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarwak">Sarwak</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Region :</label>
                                    <select class="browser-default custom-select" name="region" value="{{$company->region}} readonly id="region">
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
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Position :</label>
                                    <input class="form-control"  name="position" placeholder="Position" value="{{$company->position}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('position') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Department :</label>
                                    <input class="form-control"  name="department" placeholder="Department" value="{{$company->department}}" type="text" readonly>
                                    <span class="text-danger">{{ $errors->first('department') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Phone No :</label>
                                    <input class="form-control"  name="cell_no" placeholder="10-000000" value="{{$company->cell_no}}" type="number" readonly>
                                    <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                                </div>
                             </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Email :</label>
                                    <input class="form-control"  name="email" placeholder="Email" value="{{$company->email}}" type="email" readonly>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                             </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1"> Confirm Email :</label>
                                    <input class="form-control"  name="con_email" placeholder="Confirm Email" value="{{$company->email}}" type="email" readonly>
                                    <span class="text-danger">{{ $errors->first('con_email') }}</span>
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

