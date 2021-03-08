


<!doctype html>
<html lang="en">
    
  
<!-- Mirrored from meetmighty.com/dashboards/simpled/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 04:14:57 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title')</title>
      
      <!-- Favicon -->
      <link rel="icon" href="{{ asset('assets/images/logo111.png') }}" type = "image/x-icon"/>
      <link rel="stylesheet" href=" {{ asset('assets/css/backend-plugin.min.css') }}">
      <link rel="stylesheet" href=" {{ asset('assets/css/backende209.css?v=1.0.0') }}">
      <link rel="stylesheet" href=" {{ asset('assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href=" {{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
      <link rel="stylesheet" href=" {{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
      <link rel="stylesheet" href=" {{ asset('assets/vendor/%40icon/dripicons/dripicons.css') }}">
      
      <link rel='stylesheet' href=' {{ asset('assets/vendor/fullcalendar/core/main.css') }}' />
      <link rel='stylesheet' href=' {{ asset('assets/vendor/fullcalendar/daygrid/main.css') }}' />
      <link rel='stylesheet' href=' {{ asset('assets/vendor/fullcalendar/timegrid/main.css') }}' />
      <link rel='stylesheet' href=' {{ asset('assets/vendor/fullcalendar/list/main.css') }}' />
      <link rel="stylesheet" href=" {{ asset('assets/vendor/mapbox/mapbox-gl.css') }}">  </head>
  <body class=" ">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <div class="wrapper">
        @include('layouts.kasir.topbar')

         <!-- Page start  -->
        <div class="content-page">
        <div class="container-fluid">

            @yield('content')
        <!-- Page end  -->
        </div>
        </div>
    </div>




    <footer class="mm-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>document.write(new Date().getFullYear())</script>© <a href="https://www.linkedin.com/in/habibi-ramadhan-bb7b03203/" class="">SMK Wikrama Bogor</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
    
    <!-- Flextree Javascript-->
    <script src="{{ asset('assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('assets/js/tree.js') }}"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets/js/table-treeview.js') }}"></script>
    
    <!-- Masonary Gallery Javascript -->
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    
    <!-- Mapbox Javascript -->
    <script src="{{ asset('assets/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/js/mapbox.js') }}"></script>
    
    <!-- Fullcalender Javascript -->
    <script src='{{ asset('assets/vendor/fullcalendar/core/main.js') }}'></script>
    <script src='{{ asset('assets/vendor/fullcalendar/daygrid/main.js') }}'></script>
    <script src='{{ asset('assets/vendor/fullcalendar/timegrid/main.js') }}'></script>
    <script src='{{ asset('assets/vendor/fullcalendar/list/main.js') }}'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('assets/js/vector-map-custom.js') }}"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <script src="{{ asset('assets/js/charts/01.js') }}"></script>
    <script src="{{ asset('assets/js/charts/02.js') }}"></script>
    
    <!-- slider JavaScript -->
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    
    <!-- Emoji picker -->
    <script src="{{ asset('assets/vendor/emoji-picker-element/index.js') }}" type="module"></script>
    
    <!-- app JavaScript -->
    <script src="{{ asset('assets/js/app.js') }}"></script>  </body>

<!-- Mirrored from meetmighty.com/dashboards/simpled/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 04:14:57 GMT -->
</html>