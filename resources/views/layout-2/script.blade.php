@include("layout-2.footer")
<!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{url('public/public/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{url('public/public/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{url('public/public/assets/js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{url('public/public/assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Slick Slider JS -->
    <script src="{{url('public/public/assets/js/plugins/slick.min.js')}}"></script>
    <!-- Barrating JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery.barrating.min.js')}}"></script>
    <!-- Counterup JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery.counterup.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery.nice-select.js')}}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{url('public/public/assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
    <!-- Lightgallery JS -->
    <script src="{{url('public/public/assets/js/plugins/lightgallery.min.js')}}"></script>
    <!-- Scroll Top JS -->
    <script src="{{url('public/public/assets/js/plugins/scroll-top.js')}}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{url('public/public/assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{url('public/public/assets/js/plugins/waypoints.min.js')}}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{url('public/public/assets/js/plugins/jquery.zoom.min.js')}}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="{{url('public/public/assets/js/vendor/vendor.min.js')}}"></script>
<script src="{{url('public/public/assets/js/plugins/plugins.min.js')}}"></script>
-->

    <!-- Main JS -->
    <script src="{{url('public/public/assets/js/main.js')}}"></script>

    <script>
        var hide = "{{ session('user_id_login')}}";
        var hide1 = "{{ session('user_status_login')}}";

        if(hide){
            $("#register_hide").hide();
            $("#login_hide").hide();
            $("#profile_hide").show();
            $("#order_hide").show();
            $("#logout_hide").show();

            $("#hide_register").hide();
            $("#hide_login").hide();
            $("#hide_profile").show();
            $("#hide_order").show();
            $("#hide_logout").show();
        }else{
            $("#register_hide").show();
            $("#login_hide").show();
            $("#profile_hide").hide();
            $("#order_hide").hide();
            $("#logout_hide").hide();

            $("#hide_register").show();
            $("#hide_login").show();
            $("#hide_profile").hide();
            $("#hide_order").hide();
            $("#hide_logout").hide();
        }
    </script>

<!-- SweetAlert -->
<script src="{{url('public/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
    function alert_value(data)
    {
        $(function() {
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: data
            });
        });
    }
</script>
