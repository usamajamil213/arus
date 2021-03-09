<!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Copyright &copy; 2021<a class="text-bold-800 grey darken-2" href="#" target="_blank">ARUS,</a>All rights Reserved</span>
            <!--<span class="float-md-right d-none d-md-block">Powered by<a href="http://getcoregroup.com" target="_blank">GetCore Group</a></span>-->
             
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('public/theme/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('public/theme/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: public/Theme JS-->
    <script src="{{asset('public/theme/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: public/Theme JS-->
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('public/theme/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- BEGIN: Page Vendor JS-->
    <!-- <script src="{{asset('public/theme/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script> -->
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <!-- <script src="{{asset('public/theme/theme/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script> -->
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/theme/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('public/theme/app-assets/js/scripts/datatables/datatable.js')}}"></script>
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

   <script type="text/javascript">

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    function getStateByRegion(event,obj) 
{
    // alert("hello");
    event.preventDefault();
    var obj = $(obj).val();
    // alert(obj);
    
        
    $.ajax({
                type:'GET',
                url:'{{route("admin.state")}}',
                data:{id:obj
                },
                success: function( msg ) {
                    $('#state').html(msg);
                }
            });
   
    
}


</script>



</body>
<!-- END: Body-->
@include('vendor.sweet.alert')
@include('sweet::alert')
</html>



