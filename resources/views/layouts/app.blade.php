@php

use Illuminate\Support\Facades\DB;
$domin_url = "https://www.bazhouse.com/portal/";

$servername = "localhost";
$username = "bazhouse_db";
$db ='bazhouse_db';

$password = "B.9e6pmO2XXd6alvnvS14";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}




@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search, agency, agent, classified, directory, house, listing, property, real estate, real estate agency, real estate agent, realestate, realtor, rental">
<meta name="description" content="Bazhouse.com">
<!-- css file -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/ace-responsive-menu.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/ud-custom-spacing.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/dashbord_navitaion.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">

<!-- Responsive stylesheet -->
<!--<link rel="stylesheet" href="css/responsive.css">-->
<!-- Title -->
<title>Bazhouse.com - Dashboard</title>
<link href="{{asset('assets/favicon.jpg')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon">

<!-- Favicon -->
<!--<link href="favicon.jpg" sizes="128x128" rel="shortcut icon" type="image/x-icon">-->
    @stack('styles')

</head>

<body>

@include('includes.navbar')
    @include('includes.header')
    @include('includes.page-header')
        @yield('content')
    <!-- Custom script for all pages --> 
   
    
    </div>
  </div>
  <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
</div>

<!--<script src="js/jquery-3.6.4.min.js')}}"></script> -->
<script src="{{asset('assets/js/jquery-migrate-3.0.0.min.js')}}"></script> 
<script src="{{asset('assets/js/popper.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('assets/js/jquery.mmenu.all.js')}}"></script> 
<script src="{{asset('assets/js/ace-responsive-menu.js')}}"></script> 
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/chart-custome.js')}}"></script>
<script src="{{asset('assets/js/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('assets/js/dashboard-script.js')}}"></script>

    @stack('scripts')
</body>
</html>
