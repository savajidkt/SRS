<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('page_title') | SRS Reporting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/dashboard-fav-icon-2.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('select/css/select2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/c836b9bad1.js" crossorigin="anonymous"></script>
    <style>
         .has_error{ border: 1px solid red;}
    </style>
 <script>
    window.addEventListener( "pageshow", function ( event ) {
	if(window.performance.navigation.type == 2){
    location.reload();
}
});
 </script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-srs" src="{{ asset('images/srs_logo.jpg')}}" alt="" >
                
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('common.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

         <!--**********************************
            Sidebar start
        ***********************************-->
        @include('common.main-menu')

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
             @yield('content')
        
        </div>


       
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
         @include('common.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @include('common.scripts')
    @include('flash')
    @yield('extra-script')
</body>

</html>
