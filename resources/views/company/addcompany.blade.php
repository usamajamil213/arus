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
                            <input name="comp_adress" type="text" class="form-control" id="comp_adress" placeholder="Place Name" required>
                             <div id="address-map-container">
                             <div id="map"></div>
  
                              </div>
                            <input class="form-control" type="hidden" id="lat" required name="lat" value="">
                            <input class="form-control" type="hidden" id="lng" required name="lng" value="">
                            <span class="text-danger">{{ $errors->first('comp_adress') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_c" class="mb-1"> Postcode :</label>
                            <input class="form-control"  name="post_c" placeholder="Postcode" type="number" required maxlength="5">
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
                            <label for="validationCustom01" class="mb-1"> Added by :</label>
                             <select class="browser-default custom-select"  name="added_by"  required>
                                <option selected value="0">Added by</option>
                                <option  value="user">User</option>
                                <option  value="si">Provider</option>
                                   
                            </select>
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
<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -33.8688, lng: 151.2195 },
          zoom: 13,
          mapTypeId: "roadmap",
        });
        // Create the search box and link it to the UI element.
        const input = document.getElementById("comp_adress");
        const searchBox = new google.maps.places.SearchBox(input);

        
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
          searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
          const places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }
          // Clear out the old markers.
          markers.forEach((marker) => {
            marker.setMap(null);
          });
          markers = [];
          // For each place, get the icon, name and location.
          const bounds = new google.maps.LatLngBounds();
          places.forEach((place) => {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            const icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25),
            };
            // Create a marker for each place.
           
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();            
            markers.push(
              new google.maps.Marker({
                map,
                icon,
                title: place.name,
                draggable:true,
                position: place.geometry.location,
              })
            );
              
            google.maps.event.addListener(markers, 'drag', function (event) {
            document.getElementById("lat").value = this.getPosition().lat();
            document.getElementById("lng").value = this.getPosition().lng();
             });        
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxYoAYSwy-GASmbxY8R3cVwaA_fPfsUJs&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@endsection

