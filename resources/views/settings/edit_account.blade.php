
@extends('layouts.app')

@section('content')

<div class="dashboard__main pl0-md">
        <div class="dashboard__content property-page bgc-f7">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="dashboard_title_area">
                <h2>Edit Settings</h2>
                <p class="text">change your profile details!</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <div class="col-xl-7">
                  <div class="profile-box position-relative d-md-flex align-items-end mb50">
                    <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm">
                      <img class="w-100" src="images/listings/profile-1.jpg" alt="">
                      <a href="" class="tag-del" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Image" aria-label="Delete Item"><span class="fas fa-trash-can"></span></a>
                    </div>
                    <div class="profile-content ml30 ml0-sm">
                      <a href="" class="ud-btn btn-white2 mb30">Upload Profile Files<i class="fal fa-arrow-right-long"></i></a>
                      <p class="text">Photos must be JPEG or PNG format and least 2048x768</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <form class="form-style1">
                    <div class="row">
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">Username</label>
                          <input type="text" class="form-control" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">First Name</label>
                          <input type="text" class="form-control" placeholder="First Name">
                        </div>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">Last Name</label>
                          <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">Email</label>
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">Phone Number</label>
                          <input type="tel" class="form-control" placeholder="Phone Number">
                        </div>
                      </div>

                      <div class="col-sm-6 col-xl-4">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw600 mb10">Address</label>
                          <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="text-end">
                          <a class="ud-btn btn-dark" href="#0">Update Profile<i class="fal fa-arrow-right-long"></i></a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Social Media</h4>
                <form class="form-style1">
                  <div class="row">
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Facebook Url</label>
                        <input type="text" class="form-control" placeholder="Facebook">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Instagram Url</label>
                        <input type="text" class="form-control" placeholder="Instagram">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Linkedin Url</label>
                        <input type="text" class="form-control" placeholder="Linkedin">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="text-end">
                        <a class="ud-btn btn-dark" href="#0">Update Social<i class="fal fa-arrow-right-long"></i></a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <footer class="dashboard_footer pt30 pb10">
          <div class="container">
            <div class="row items-center justify-content-center justify-content-md-between">
              <div class="col-auto">
                <div class="copyright-widget">
                         <p class="text">©<script>document.write(/\d{4}/.exec(Date())[0])</script>2023
                    Bazhouse - All rights reserved</p>
                </div>
              </div>
              <div class="col-auto">
                <div class="footer_bottom_right_widgets text-center text-lg-end">
                  <p><a href="#">Privacy</a>  ·  <a href="#">Terms</a>  ·  <a href="#">Sitemap</a></p>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      @endsection
