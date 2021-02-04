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
                            <h2 class="content-header-title float-left mb-0">Notifications</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Notifications
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        {{-- <button class="btn-icon btn btn-primary btn-round btn-sm" type="button" data-toggle="modal" data-target="#add_wifi"><i class="feather icon-plus"></i> ADD NEW</button> --}}


                       {{--  <a href="{{route('notification.addcustomnotifications')}}" class="btn btn-raised btn-primary waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add Notifications</a>
 --}}

                        
                    </div>
                </div>
            </div>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      
      
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         {{--  <div class="section-header">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="section-header-breadcrumb-content">
                  <h1>Notification</h1>
                </div>
              </div>              
            </div>
          </div> --}}
          <div class="row">
            
            <div class="col-md-12">
              
            

                            <div class="col col-sm-12 col-md-12 col-lg-12">
                                        <div class="card" style="overflow: none">
                                            <div class="card-body">
                                                @if($fun=='add')
                                                <form method="post" action="{{route('savecustomnotifications')}}" enctype="multipart/form-data">
                                                @else    
                                                <form method="post" action="{{route('updatecustomnotifications')}}" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="{{$id}}">    
                                                @endif   
                                                {{csrf_field()}}                                                      
                                                <div class="row">
                                                    <div class="col col-sm-12 col-md-12 col-lg-12">

                                                        @if(isset($sms))
                                                            @php $value = $sms->title; @endphp
                                                        @else
                                                            @php $value = ''; @endphp
                                                        @endif

                                                        <div class="input-field offset-l col col-sm-12 col-md-12 col-lg-12">
                                                             <label for="title">Title</label>
                                                            <input name="title" id="title" class="form-control" type="text" value="{{$value}}" class="validate" >
                                                           
                                                        </div>

                                                    </div>

                                                    @if(isset($sms))
                                                            @php $value = $sms->short_desc; @endphp
                                                        @else
                                                            @php $value = ''; @endphp
                                                        @endif
                                                    <div class="col col-sm-12 col-md-12 col-lg-12">
                                                        <div class="input-field offset-l col col-sm-12 col-md-12 col-lg-12">
                                                             <label for="short_description">Short Desc.</label>
                                                            <input name="short_desc" class="form-control" id="short_description" type="text" value="{{$value}}" class="validate" >



                                                           
                                                        </div>

                                                    </div>  

                                                    @if(isset($sms))
                                                            @php $value = $sms->long_desc; @endphp
                                                        @else
                                                            @php $value = ''; @endphp
                                                        @endif

                                                    <div class="col col-sm-12 col-md-12 col-lg-12">
                                                        <div class="input-field offset-l col col-sm-12 col-md-12 col-lg-12">
                                                            <label for="long_description">Long Desc.</label>
                                                            <input name="long_description" class="form-control" id="long_description" type="text" value="{{$value}}" class="validate" >
                                                            
                                                        </div>

                                                    </div>

                                                    <div class="col col-sm-12 col-md-6 col-lg-6">
                                                        <div class="input-field offset-l col col-sm-12 col-md-12 col-lg-12">
                                                         <label class="col-md-12" for="image">Image</label>    
                                                        @if(isset($sms))
                                                            @php $value = $sms->image; @endphp
                                                            <img src="{{$value}}" style="width: 100%">
                                                        @else
                                                            @php $value = ''; @endphp
                                                        @endif
                                                           
                                                            <input name="image" id="image" type="file" class="validate" >
                                                            
                                                        </div>

                                                    </div>

                                                    

                                                        @if(isset($sms))
                                                            @php $value = $sms->status; @endphp
                                                        @else
                                                            @php $value = ''; @endphp
                                                        @endif 
                                                    <div class="col col-sm-12 col-md-6 col-lg-6">
                                                        <div class="input-field offset-l col col-sm-12 col-md-12 col-lg-12">
                                                            <label for="short_description">Active</label>
                                                            <select class="validate form-control" name="active" id="active">
                                                                
                                                                  @if($value==1)
                                                                 <option value="1" selected="selected">Active</option>   
                                                                @else
                                                                 <option value="1">Active</option>   
                                                                @endif

                                                                @if($value==0)
                                                                 <option selected="selected" value="0">In-Active</option>    
                                                                @else
                                                                 <option value="0">In-Active</option>    
                                                                @endif                                                                

                                                            </select>
                                                            
                                                        </div>

                                                    </div>

                                                    </div>

                                                    <div class="clearfix"></div>
                                                     <div class="col col-sm-12 col-lg-12"> <br>
                                                                            <button id="save-button" class="btn btn-primary save-btn cyan waves-effect waves-light right" type="submit" name="save">Save
                                                                            </button>


                                                    </div>   
                                                </form>
                                            </div>    
                                        </div>
                                    </div>


        
            </div>

          </div>          
        </section>
    </div>      
    </div>
    </div>
    </div>
  </div>

 @endsection()