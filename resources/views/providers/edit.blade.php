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

                        <h2 class="content-header-title float-left mb-0">SI</h2>

                        <div class="breadcrumb-wrapper col-12">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                </li>

                                <li class="breadcrumb-item active">SI

                                </li>
                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <form class="form-group" action="{{route('admin.providerupdate')}}" method="POST" enctype="multipart/form-data" id="">

            @csrf

            <div class="modal-header">                  
            </div>

            <div class="form">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> First Name</label>
                            <input class="form-control"  name="name"type="text" required value="{{$provider->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Last Name</label>
                            <input class="form-control"  name="l_name" type="text" required value="{{$provider->l_name}}">
                            <input type="hidden" name="id" value="{{$provider->id}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Phone Number </label>
                            <input class="form-control"  name="phone" type="text" required value="{{$provider->phone}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Email</label>
                            <input class="form-control"  name="email" type="email" required value="{{$provider->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Address</label>
                            <textarea class="form-control" id="comp_adress" name="address" rows="3">{{$provider->address}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Department</label>
                            <input class="form-control"  name="department" type="text" required value="{{$provider->department}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Position</label>
                            <input class="form-control"  name="position" type="text" required value="{{$provider->position}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Postcode</label>
                            <input class="form-control"  name="post_code" type="text" required value="{{$provider->post_code}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Approved</label>
                            <select class="browser-default custom-select" name="is_approve" id="approve" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Region</label>
                            <select class="form-control custom-select" onchange="getStateByRegion(event,this)" name="region" id="region" required>
                                    @foreach ($regions as $item)
                                    <option value="{{ $item->id }}" @if($provider->state->region->id == $item->id) selected @endif>{{ $item->region}}</option>
                                    @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('region') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">State</label>
                            <select class="browser-default custom-select" name="state" id="state" required>
                                @foreach($states as $item)
                                <option value="{{$item->id}}" @if($provider->state_id == $item->id) selected @endif>{{$item->state}}</option>
                                @endforeach
            
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Company Name</label>
                            <select class="browser-default custom-select" name="company" id="state" required>

                            <option selected value="{{$provider->company->id}}">{{$provider->company->comp_name}}</option>
                            @foreach($companies as $comp)
                            <option value="{{$comp->id}}">{{$comp->comp_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach($provider->certificate as $p)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Certificate</label>
                            <br>
                            <img src="{{asset('public/images/user_certificates/'.$p->certicate_image)}}" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                                
                </div>

            </div>

            <div class="pull-left">

                <button type="submit" class="btn btn-primary ">Update</button>


            </div>

        </form> 
            
    </div>
</div>

@endsection

