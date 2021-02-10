

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">





<!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

        <div class="navbar-header">

            <ul class="nav navbar-nav flex-row">

                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">

                        <!--<div class="brand-logo"></div>-->

                        <h2 class="brand-text mb-0">ARUS-EX</h2>

                    </a></li>

                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>

            </ul>

        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content">

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                   
                <li class="nav-item" id=""><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>

                <li class=" nav-item" id="admins"><a href="{{route('admin.skills')}}"><i class="feather icon-sunrise"></i><span class="menu-title" data-i18n="Users">Skills</span></a></li>

                <li class=" nav-item" id="admins"><a href="{{route('admin.company')}}"><i class="feather icon-globe"></i><span class="menu-title" data-i18n="Users">Company</span></a></li>
                

                <!-- <li class=" nav-item"><a href=""><i class="feather icon-volume-1"></i><span class="menu-title" data-i18n="Campaigns">Campaigns</span></a></li>

                <li class=" nav-item"><a href=""><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Categories">Categories</span></a></li> -->



                {{-- <li class=" navigation-header"><span>Admin</span></li>

                

                <li class=" nav-item" id="admins"><a href=""><i class="feather icon-users"></i><span class="menu-title" data-i18n="Users">Spot Admins</span></a></li> --}}

                


                
                
                  

                 <!--@can('admin')-->
                 <!--<li class=" nav-item" id="places"><a href=""><i class="feather icon-map-pin"></i><span class="menu-title" data-i18n="Withdrawals">places</span></a></li>-->

                 <!--@endcan()-->
                 <!--@can('superadmin')-->
                 <!--<li class=" nav-item" id="places"><a href=" "><i class="feather icon-map-pin"></i><span class="menu-title" data-i18n="Withdrawals">places</span></a></li>-->
                 <!--@endcan()-->

                <!-- <li class=" nav-item"><a href="trnx-disbursements.html"><i class="feather icon-upload"></i><span class="menu-title" data-i18n="Disbursements">Disbursements</span></a></li>

                <li class=" nav-item"><a href="trnx-reversals.html"><i class="feather icon-rotate-ccw"></i><span class="menu-title" data-i18n="Reversals">Reversals</span></a></li> -->            

                <hr/>



                

            </ul>

        </div>

    </div>

    <!-- END: Main Menu