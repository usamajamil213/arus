  @extends('admin.partials.default')

  @section('content')  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      
      
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="section-header-breadcrumb-content">
                  <h1>Notification</h1>
                </div>
              </div>              
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-12">
              
<a href="{{-- {{route('admin.notification.addcustomnotifications')}} --}}" class="btn btn-raised btn-primary waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add Notifications</a>
              <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size: 13px;">
                                <thead>
                                    <tr>
                                         <th>S.no</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Short Desc.</th>
                                                <th>Long Desc.</th>
                                                <th>Status</th>
                                                <th><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="Help" >Actions</a></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                         <th>S.no</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Short Desc.</th>
                                                <th>Long Desc.</th>
                                                <th>Status</th>
                                                <th><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="Help" >Actions</a></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if($result->count()>0) 
                                    @php $i=$result->firstItem(); @endphp 
                                    @endif
                                                                     
                                    @foreach($result as $re)                                   

                                    <tr>
                                       <td>{{$i++}}</td>
                                        <td><img src="{{$re->image}}" style="width: 200px;"></td>
                                        <td>{{$re->title}}</td>
                                        <td>{{$re->short_desc}}</td>
                                        <td>{{$re->long_desc}}</td>
                                        <td>@if($re->status==1) {{'Yes'}} @else {{'No'}} @endif</td>
                                       
                                        <td>
                                               <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                 
                                                  <li class="ul_list_pad"><a href="{{-- {{ URL::Route('admin/edit/custom/notifications',[$re->id]) }} --}}"> <i class="fa fa-edit"></i> Edit</a></li>
                                                  
                                                  <li class="ul_list_pad"><a href="{{-- {{route('admin/custom/notification/delete',['id'=>$re->id])}} --}}" class="button delete-confirm"> <i class="fa fa-trash"></i> Delete</a></li>

                                                  <?php if ($re->status == 0) { ?>
                                                            <li class="ul_list_pad"><a onclick="" class="sweet-active grey-text text-darken-2" href="{{-- {{ URL::Route('admin/custom/notification/active',[$re->id]) }} --}}"><i class="fa fa-eye"></i>  Active</a></li>
                                                            <?php } else { ?>
                                                            <li class="ul_list_pad"><a class="sweet-inactive grey-text text-darken-2" href="{{-- {{ URL::Route('admin/custom/notification/inactive',[$re->id]) }} --}}"><i class="fa fa-eye"></i>  In-Active </a></li>

                                                            <?php } ?>                                                  
                                                                                                  
                                                </ul>
                                              </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                    
                                </tbody>
                            </table>
                            {{$result->links('pagination::bootstrap-4')}}
                        </div>


            </div>

          </div>          
        </section>
    </div>      
    </div>
  </div>
 @endsection()