
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="advanced search, agency, agent, classified, directory, house, listing, property, real estate, real estate agency, real estate agent, realestate, realtor, rental">
  <meta name="description" content="BAZHOUSE.IT">
  <meta name="CreativeLayers" content="ATFN">
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
<link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/dashbord_navitaion.css')}}">

<!-- Responsive stylesheet -->
<!--<link rel="stylesheet" href="css/responsive.css">-->
<!-- Title -->
<title>Bazhouse.com - Login</title>
<link href="{{asset('assets/favicon.jpg')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon">


</head>
<body>
          <div class="col-auto login">
            <div class="d-flex align-items-center">
              <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="far fa-user-circle fz16 me-2"></i> <span class="d-none d-xl-block">Login / Register</span></a>
              
            </div>
          </div>
  </header>
  <!-- Signup Modal -->
  <div class="signup-modal">
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Welcome to Bazhouse</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="log-reg-form">
              <div class="navtab-style2">
                <nav>
                  <div class="nav nav-tabs mb20" id="nav-tab" role="tablist">
                    <button class="nav-link active fw600" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sign In</button>
                    <button class="nav-link fw600" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">New Account</button>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent2">
                  <div class="tab-pane fade show active fz15" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="form-style1">
                      <div class="mb25">
                        <label class="form-label fw600 dark-color">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email">
                      </div>
                      <div class="mb15">
                        <label class="form-label fw600 dark-color">Password</label>
                        <input type="text" class="form-control" placeholder="Enter Password">
                      </div>
                      <div class="checkbox-style1 d-block d-sm-flex align-items-center justify-content-between mb10">
                        <label class="custom_checkbox fz14 ff-heading">Remember me
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                        <a class="fz14 ff-heading" href="reset-password.html">Lost your password?</a>
                      </div>
                      <div class="d-grid mb20">
                        <button class="ud-btn btn-thm" type="button">Sign in <i class="fal fa-arrow-right-long"></i></button>
                      </div>
                      
                    </div>
                    <div class="hr_content mb20"><hr><span class="hr_top_text">OR</span></div>
                      <div class="d-grid mb10">
                        <button class="ud-btn btn-white" type="button"><i class="fab fa-google"></i> Continue Google</button>
                      </div>
                      <div class="d-grid mb10">
                        <button class="ud-btn btn-fb" type="button"><i class="fab fa-facebook-f"></i> Continue Facebook</button>
                      </div>
                      <div class="d-grid mb20">
                        <button class="ud-btn btn-apple" type="button"><i class="fab fa-apple"></i> Continue Apple</button>
                      </div>
                  </div>
                  <div class="tab-pane fade fz15" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="form-style1">
                      <div class="mb25">
                        <label class="form-label fw600 dark-color">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email">
                      </div>
                      <div class="mb20">
                        <label class="form-label fw600 dark-color">Password</label>
                        <input type="text" class="form-control" placeholder="Enter Password">
                      </div>
                      <div class="d-grid mb20">
                        <button class="ud-btn btn-thm" type="button">Create account <i class="fal fa-arrow-right-long"></i></button>
                      </div>
                      <div class="hr_content mb20"><hr><span class="hr_top_text">OR</span></div>
                      <div class="d-grid mb10">
                        <button class="ud-btn btn-white" type="button"><i class="fab fa-google"></i> Continue Google</button>
                      </div>
                      <div class="d-grid mb10">
                        <button class="ud-btn btn-fb" type="button"><i class="fab fa-facebook-f"></i> Continue Facebook</button>
                      </div>
                      <div class="d-grid mb20">
                        <button class="ud-btn btn-apple" type="button"><i class="fab fa-apple"></i> Continue Apple</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   

<!-- Wrapper End --> 
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
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
<script src="{{asset('assets/js/script.js')}}"></script>


<!-- Custom script for all pages --> 
<script src="js/script.js"></script>

</body></html>
