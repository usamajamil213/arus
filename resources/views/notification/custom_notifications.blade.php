

@extends('admin.partials.default')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Notifications</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Notifications
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        {{-- <button class="btn-icon btn btn-primary btn-round btn-sm" type="button" data-toggle="modal" data-target="#add_wifi"><i class="feather icon-plus"></i> ADD NEW</button> --}}


                        <a href="{{route('notification.addcustomnotifications')}}" class="btn btn-raised btn-primary btn-round waves-effect float-right"><i class="feather icon-plus"></i> Add Notifications</a>


                        
                    </div>
                </div>
            </div>
            <!-- Add Modal -->
            {{-- <div class="modal fade" id="add_wifi" tabindex="-1" aria-labelledby="add_wifiLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="add_wifiLabel">Add Notification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form method="POST" action="{{ route('wifi_hotspots.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="wifi_name">Wifi Name</label>
                                            <input id="wifi_name" name="wifi_name" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input id="wifi_location" name="wifi_location" type="text" class="form-control" required>

                                            <input id="wifi_lat" name="wifi_lat" type="hidden" class="form-control" required>

                                            <input id="wifi_lng" name="wifi_lng" type="hidden" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ssid">SSID</label>
                                            <input id="wifi_ssid" name="wifi_ssid" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ssid">BSSID</label>
                                            <input id="wifi_bssid" name="wifi_bssid" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pin">PIN</label>
                                            <input id="wifi_pin" name="wifi_pin" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            <!-- END Modal -->
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div> -->
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        {{-- <th>Location</th> --}}
                                        <th>Title</th>
                                        <th>Short Desc.</th>
                                        <th>Long Desc.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        {{-- <th>Location</th> --}}
                                        <th>Title</th>
                                        <th>Short Desc.</th>
                                        <th>Long Desc.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    @foreach ($result as $re)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{$re->image}}" style="width: 100px;"></td>
                                            {{-- <td>{{$hotspot->wifi_location}}</td> --}}
                                            {{-- <td>{{$hotspots[$i].lat}}{{$hotspots[$i].lng}}</td> --}}
                                            <td>{{$re->title}}</td>
                                            <td>{{$re->short_desc}}</td>
                                            <td>{{$re->long_desc}}</td>
                                            <td>@if($re->status==1) {{'Active'}} @else {{'In-Active'}} @endif</td>
                                            {{-- <td>{{$hotspots[$i].lat}}{{$hotspots[$i].lng}}</td> --}}
                                            {{-- <td>{{$hotspot->wifi_ssid}}</td> --}}
                                            <td>
                                           <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                 
                                                  <li class="ul_list_pad"><a href="{{ URL::Route('edit/custom/notifications',[$re->id]) }}"> <i class="fa fa-edit"></i> Edit</a></li>
                                                  
                                                  <li class="ul_list_pad"><a href="{{route('custom/notification/delete',['id'=>$re->id])}}" class="button delete-confirm"> <i class="fa fa-trash"></i> Delete</a></li>

                                                  <?php if ($re->status == 0) { ?>
                                                            <li class="ul_list_pad"><a onclick="" class="sweet-active grey-text text-darken-2" href="{{ URL::Route('custom/notification/active',[$re->id]) }}"><i class="fa fa-eye"></i>  Active</a></li>
                                                            <?php } else { ?>
                                                            <li class="ul_list_pad"><a class="sweet-inactive grey-text text-darken-2" href="{{ URL::Route('custom/notification/inactive',[$re->id]) }}"><i class="fa fa-eye"></i>  In-Active </a></li>

                                                            <?php } ?>                                                  
                                                                                                  
                                                </ul>
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
    <!-- END: Content-->
    <script>
        window.onload = function() {
        document.getElementById('notifications').classList.add('active');
        };
    </script>

@endsection
