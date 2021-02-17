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
                    <div class="row">

                        <div class="col-lg-4 col-sm-6 col-12">
                            <a class="custom-card text-dark" href="{{route('admin.usershow')}}">    

                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <!-- <a href="{{route('admin.usershow')}}"> -->
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            <!-- </a> -->
                                            
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$users}}</h2>
                                    <p class="mb-0">Users</p>
                                </div>
                                <!--<div class="card-content">-->
                                <!--    <div id="line-area-chart-1"></div>-->
                                <!--</div>-->
                            </div>
                            </a>
                        </div>


                        
                            <div class="col-lg-4 col-sm-6 col-12">
                            <a class="custom-card text-dark" href="{{route('admin.company')}}">    
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                           <!-- <a href="{{route('admin.company')}}"> -->
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        <!-- </a> -->
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$companies}}</h2>
                                    <p class="mb-0">Companies </p>
                                </div>
                                <!--<div class="card-content">-->
                                <!--    <div id="line-area-chart-2"></div>-->
                                <!--</div>-->
                            </div>
                        </a>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-12">
                            <a class="custom-card text-dark" href="{{route('admin.providershow')}}">    
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i> 
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$providers}}</h2>
                                    <p class="mb-0">Providers</p>
                                </div>
                                <!--<div class="card-content">-->
                                <!--    <div id="line-area-chart-3"></div>-->
                                <!--</div>-->
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    {{-- <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title">Funds Raised</h4>
                                    <div class="dropdown chart-dropdown">
                                        <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem3">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-start">
                                            <div class="mr-2">
                                                <p class="mb-50 text-bold-600">This Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">TZS</sup>
                                                    <span class="text-success">683,000<i class="feather icon-arrow-up"></i></span>
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="mb-50 text-bold-600">Last Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">TZS</sup>
                                                    <span>589,000</span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div id="revenue-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Subscriber Stats</h4>
                                </div>
                                <div class="card-content">
                                    <ul class="list-group list-group-flush customer-info">
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                                <span class="text-bold-600">Vodacom</span>
                                            </div>
                                            <div class="product-result">
                                                <span>890,000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-info"></i>
                                                <span class="text-bold-600">Tigo</span>
                                            </div>
                                            <div class="product-result">
                                                <span>258,000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                                <span class="text-bold-600">Airtel</span>
                                            </div>
                                            <div class="product-result">
                                                <span>258,000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                                <span class="text-bold-600">Halotel</span>
                                            </div>
                                            <div class="product-result">
                                                <span>258,000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                                <span class="text-bold-600">TTCL</span>
                                            </div>
                                            <div class="product-result">
                                                <span>258,000</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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

    <script>

        window.onload = function() {

        document.getElementById('dashboard').classList.add('active');

        };

    </script>