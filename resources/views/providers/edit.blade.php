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

                        <h2 class="content-header-title float-left mb-0">Provider</h2>

                        <div class="breadcrumb-wrapper col-12">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

                                </li>

                                <li class="breadcrumb-item active">Provider

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
                            <label for="validationCustom01" class="mb-1"> First Name:</label>
                            <input class="form-control"  name="name"type="text" required value="{{$provider->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Last Name :</label>
                            <input class="form-control"  name="l_name" type="text" required value="{{$provider->l_name}}">
                            <input type="hidden" name="id" value="{{$provider->id}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"> Phone No </label>
                            <input class="form-control"  name="phone" type="text" required value="{{$provider->phone}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Email</label>
                            <input class="form-control"  name="email" type="text" required value="{{$provider->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Adress</label>
                            <textarea class="form-control" id="comp_adress" name="address" rows="3" required>{{$provider->address}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Aproved</label>
                            <select class="browser-default custom-select" name="is_approve" id="state" required>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Company</label>
                            <select class="browser-default custom-select" name="company" id="state" required>

                            <option selected value="{{$provider->id}}">{{$provider->company->comp_name}}</option>
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

