@extends('layouts.app')
    <meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')

@php
$img_link='https://bazhouse.com/portal/storage/app/public/property_imgs/';
$default_img= "http://placehold.it/180";
@endphp
<style>




    .mt-5 {
        margin-top: 50px !important;
    }
    
    .fz12 {
    display:none;
    background-color: #fab719;
    border-radius: 6px;
    color: #ffffff;
    font-family: var(--title-font-family);
    font-weight: 600;
    left: 20px;
    opacity: 1;
    padding: 2px 12px;
    position: absolute;
    top: 20px;
    transform: translateY(0px);
    visibility: visible;
    font-size: 12px;
}
    
</style>



<div class="dashboard__main pl0-md">
  <div class="row align-items-center px-5 ">
    <div class="col-lg-12">
      <div class="dashboard_title_area">
        <h2>Edit Property</h2>
        <p class="text">We are glad to see you again!</p>
      </div>
    </div>
  </div>
  <div class="col-md-12 px-5">
         @if(session('success'))
    <div class="alert alert-danger">
      {{ session('success') }}
    </div>
    @endif
    </div>
  
  
  <div class="row px-5">
    <div class="col-xl-12">
      <div class="ps-widget bgc-white bdrs12 default-box-shadow2 pt30 mb30 overflow-hidden position-relative">
        <div class="navtab-style1">
          <nav>
            <div class="nav nav-tabs" id="nav-tab2" role="tablist">
              <button class="nav-link active fw600 ms-3" id="nav-item1-tab" data-bs-toggle="tab" data-bs-target="#nav-item1" type="button" role="tab" aria-controls="nav-item1" aria-selected="true">1. Description</button>
              <button class="nav-link fw600" id="nav-item2-tab" data-bs-toggle="tab" data-bs-target="#nav-item2" type="button" role="tab" aria-controls="nav-item2" aria-selected="false">2. Media</button>
              <button class="nav-link fw600" id="nav-item3-tab" data-bs-toggle="tab" data-bs-target="#nav-item3" type="button" role="tab" aria-controls="nav-item3" aria-selected="false">3. Location</button>
              <button class="nav-link fw600" id="nav-item4-tab" data-bs-toggle="tab" data-bs-target="#nav-item4" type="button" role="tab" aria-controls="nav-item4" aria-selected="false">4. Detail</button>
              <button class="nav-link fw600" id="nav-item5-tab" data-bs-toggle="tab" data-bs-target="#nav-item5" type="button" role="tab" aria-controls="nav-item5" aria-selected="false">5. Amenities</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-item1" role="tabpanel" aria-labelledby="nav-item1-tab">
              <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Property Description</h4>
                @foreach($property as $data)
                @endforeach
                <form class="form-style1" method="post" action="{{ route('property_edit', ['id' => $data['id']]) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Title <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" placeholder="Your Name" name="title" value="{{$data['title']}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600">Description</label> <br>
                        <label class="heading-color ff-heading fw600 mb10">Ask our AI to generate text for you <img src="{{asset('assets/images/listings/typing.gif')}}" alt="typing" width="80"></label>
                        <input type="text" class="form-control mb20 gpt" placeholder="Send a message" name="message">
                        <textarea cols="30" rows="5" name="ai_written" placeholder="AI writing ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Select Category</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick">
                            <div id="category_list">
                              <select class="selectpicker" multiple="" name="selected_category[]">
                                @php

                                $categories = DB::table('p_categories')->get();
                                $p_categories = json_decode($categories, true);
                                $p_categories_id = DB::table('properties_categories')->where('properties_id',$data['id'])->get();
                                $p_categories_id = json_decode($p_categories_id,true);
                                @endphp

                                @foreach ($p_categories as $category)
                                <option value="{{ $category['id'] }}" @foreach($p_categories_id as $property_categories) {{$property_categories['id']}} {{$property_categories['categories_id'] == $category['id']  ? 'selected' : ''}} @endforeach>{{ $category['categories'] }}</option>
                                @endforeach
                              </select>


                            </div>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Listed in</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick">
                            <div id="linst_in">
                              <select class="selectpicker" multiple="" name="list_in[]">
                                @php
                                $p_listing_type = DB::table('p_listing_type')->get();
                                $p_listing_type_data = json_decode($p_listing_type, true);
                                $properties_list_in = DB::table('properties_list_in')->where('properties_id',$data['id'])->get();
                                $properties_list_in_id = json_decode($properties_list_in,true);

                                @endphp

                                @foreach ($p_listing_type_data as $listing_type_data)
                                <option value="{{ $listing_type_data['id'] }}" @foreach($properties_list_in_id as $properties_list) {{$properties_list['id']}} {{$properties_list['list_in_id'] == $listing_type_data['id']  ? 'selected' : ''}} @endforeach>{{ $listing_type_data['listing_type'] }}</option>
                                @endforeach
                              </select>


                            </div>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Construction Status</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick">
                            <div id="construction_status">
                              <select class="selectpicker" multiple="" name="construction_status[]">
                                @php
                                $p_construction_status = DB::table('p_construction_status')->get();
                                $p_construction_data = json_decode($p_construction_status, true);
                                $construction_status = DB::table('construction_status')->where('property_id',$data['id'])->get();
                                $construction_status = json_decode($construction_status,true);

                                @endphp

                                @foreach ($p_construction_data as $p_construction)
                                <option value="{{ $p_construction['id'] }}" @foreach($construction_status as $construction) {{$construction['id']}} {{$construction['construction_id'] == $p_construction['id']  ? 'selected' : ''}} @endforeach>{{ $p_construction['construction_status'] }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-3" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-xl-2">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">Choose Currency</label>
                        <div class="location-area">
                          <select class="form-control" name="currency">
                            <option>$ Dollar</option>
                            <option>€ Euro</option>
                            <option>£ British Pound</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">Price <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" placeholder="Full price" name="price" value="{{$data['price']}}">
                      </div>
                    </div>
                    <div class="col-sm-4 col-xl-2">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">M² Price</label>
                        <input type="text" class="form-control" placeholder="m² Price" name="m_price">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-sm-flex justify-content-between">
                        <a class="ud-btn btn-dark" href="#nav-item2">Next Step <i class="fal fa-arrow-right-long"></i></a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-item2" role="tabpanel" aria-labelledby="nav-item2-tab">
              <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Upload photos of your property</h4>
                <div class="col-lg-12">
                    
                  <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2 mt-5">
                    <div class="icon mb30 mt-5"><span class="flaticon-upload"></span></div>
                    <h4 class="title fz17 mb10 mt-5">Upload photos of your property</h4>
                    <label class="heading-color ff-heading fw600 mb10">Our AI Rendering will beautify your images <img src="{{ asset('assets/images/listings/beautify.gif')}}" alt="typing" width="70"></label>
                    <p class="text mb25">Photos must be JPEG or PNG format and least 2048x768</p>
                    <input name="images[]" class="ud-btn btn-white"  id="upload" type="file" multiple="">
                    <input  style="display:none" type="text" id="ai_generated_images" name="ai_generated_images">


                    <!--<a  href="" id="upload_link">Browse Files<i class="fal fa-arrow-right-long"></i></a>-->
                  </div>
                </div>
                @php
                        $img_json_string = ''; // Initialize the variable
                        $orignal = []; // Initialize the array
                
                        $get_orignal_property_imges = DB::table('property_img')->where(['property_id' => $data['id'], 'type' => 'orignal'])->get(['img']);
                        $orignal_property_imges = json_decode($get_orignal_property_imges, true);
                
                        if (!empty($orignal_property_imges)) {
                            foreach ($orignal_property_imges as $orignal_property_image) {
                                $img_orignal = $orignal_property_image['img'];
                                array_push($orignal, $img_orignal);
                            }
                            $img_json_string = json_encode($orignal);
                        }
                        @endphp
                        @if(!empty($orignal_property_imges))
                <div class="col-lg-12">
                  <div class="dashboard_title_area">
                    <h2>Orignal Property images</h2>
                  </div>
                </div>
            <div class="col-lg-5">
                    <div class="profile-box position-relative d-md-flex align-items-end mb50">
                        @foreach($orignal_property_imges as $orignal_property_image)
                            <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm">
                                <img class="w-50 orignal_propert_img" style="width:50%; height: auto;" src="{{ ($img_link . $orignal_property_image['img']) }}" alt="">
                                <div class="tag-del" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Image" aria-label="Delete Item"><span class="fas fa-trash-can"></span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @php
                 $get_ai_property_images = DB::table('property_img')->where(['property_id' => $data['id'], 'type' => 'ai_generated_image'])->get(['img']);
                 $ai_property_images = json_decode($get_ai_property_images, true);
                 @endphp
                 @if(!empty($ai_property_images))
                <div class="col-lg-12">
                  <div class="dashboard_title_area">
                    <h2>AI Generated Property images</h2>
                  </div>
                </div>
                
                <div class="col-lg-5">
                <div class="profile-box position-relative d-md-flex align-items-end mb50">
                        @foreach($ai_property_images as $ai_property_image)
                            <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm" style="margin-right: 10px;">
                                <img class="w-50 orignal_propert_img" style="width:50%; height: auto;" src="{{ ($img_link . $ai_property_image['img']) }}" alt="">
                                <div class="tag-del" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Image" aria-label="Delete Item"><span class="fas fa-trash-can"></span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                 @endif


                <div class="form-style1" style="display:none;">
                  <div class="row">
                    <h4 class="title fz17 mb30">Video Option</h4>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">Video from</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" multiple="" name="video_from">
                              <option>Youtube</option>
                              <option>Facebook</option>
                              <option>Vimeo</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-4" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">Embed Video id</label>
                        <input type="text" class="form-control" placeholder="embed code" name="embed_video_id">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h4 class="title fz17 mb30">Virtual Tour</h4>
                    <div class="col-sm-6 col-xl-12">
                      <div class="mb30">
                        <label class="heading-color ff-heading fw600 mb10">Virtual Tour</label>
                        <input type="text" class="form-control" placeholder="Virtual Tour" name="Virtual_tour">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-sm-flex justify-content-between">
                        <a class="ud-btn btn-white" href="#0">Prev Step<i class="fal fa-arrow-right-long"></i></a>
                        <a class="ud-btn btn-dark" href="#nav-item3">Next Step<i class="fal fa-arrow-right-long"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                
                
              </div>
            </div>
            <div class="tab-pane fade" id="nav-item3" role="tabpanel" aria-labelledby="nav-item3-tab">
              <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Listing Location</h4>
                <div class="form-style1">
                  <div class="row">
                    <div class="col-sm-6 col-xl-6">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Country <span style="color:red;"> * </span></label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick">
                            <div id="country">
                              <select id="get_country_id" class="selectpicker" name="selected_country">
                                @php
                                $p_countries = DB::table('p_countries')->get();
                                $p_countries = json_decode($p_countries, true);
                                @endphp
                                @foreach ($p_countries as $p_countries_data)
                                <option value="{{ $p_countries_data['id'] }}" {{$p_countries_data['id'] == $data['country']  ? 'selected' : ''}}>{{ $p_countries_data['country'] }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-5" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">City <span style="color:red;"> * </span></label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick select-wrapper" >
                              <div id="city">
                                <select class="selectpicker" name="city_id" list="your-data-list">
                                        @php
                                        $p_cities = DB::table('p_cities')->where('country_id', '=', $data['country'])->get();
                                        $p_cities = json_decode($p_cities, true);
                                        @endphp
                            
                                        @foreach ($p_cities as $p_cities_data)
                                        <option value="{{ $p_cities_data['id'] }}" {{$p_cities_data['id'] == $data['city_id']  ? 'selected' : ''}}>{{ $p_cities_data['name'] }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="dropdown-menu">
                                    <div class="inner show" role="listbox" id="bs-select-6" tabindex="-1" aria-multiselectable="true">
                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                    </div>
                            </div>
                            
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Address <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" placeholder="Address" name="Address" value="{{$data['address_1']}}">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Zip <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" placeholder="Zip code" name="zip" value="{{$data['postal_code']}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb20 mt30">
                        <label class="heading-color ff-heading fw600 mb30">Place the listing pin on the map</label>
                        <iframe class="h550" loading="lazy" src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-sm-flex justify-content-between">
                        <a class="ud-btn btn-white" href="#0">Prev Step<i class="fal fa-arrow-right-long"></i></a>
                        <a class="ud-btn btn-dark" href="#nav-item4">Next Step<i class="fal fa-arrow-right-long"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-item4" role="tabpanel" aria-labelledby="nav-item4-tab">
              <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Listing Detail</h4>
                <div class="form-style1">
                  <div class="row">
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Size in ft (only numbers) <span style="color:red;"> * </span></label>
                        <input type="number" class="form-control" placeholder="Size" name="size" value="{{$data['area_sqft']}}">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Rooms <span style="color:red;"> * </span></label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick">
                            <select class="selectpicker" multiple="" name="rooms">
                              <option value="1" {{ ( '1' == $data['bedrooms']) ? 'selected' : '' }}>1</option>
                              <option value="2" {{ ( '2' == $data['bedrooms']) ? 'selected' : '' }}>2</option>
                              <option value="3" {{ ( '3' == $data['bedrooms']) ? 'selected' : '' }}>3</option>
                              <option value="4" {{ ( '4' == $data['bedrooms']) ? 'selected' : '' }}>4</option>
                              <option value="5" {{ ( '5' == $data['bedrooms']) ? 'selected' : '' }}>5</option>
                              <option value="6" {{ ( '6' == $data['bedrooms']) ? 'selected' : '' }}>6</option>
                              <option value="7" {{ ( '7' == $data['bedrooms']) ? 'selected' : '' }}>7</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-7" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Bedrooms <span style="color:red;"> * </span></label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" multiple="" name="bedrooms">
                              <option value="1" {{ ( '1' == $data['bedrooms']) ? 'selected' : '' }}>1</option>
                              <option value="2" {{ ( '2' == $data['bedrooms']) ? 'selected' : '' }}>2</option>
                              <option value="3" {{ ( '3' == $data['bedrooms']) ? 'selected' : '' }}>3</option>
                              <option value="4" {{ ( '4' == $data['bedrooms']) ? 'selected' : '' }}>4</option>
                              <option value="5" {{ ( '5' == $data['bedrooms']) ? 'selected' : '' }}>5</option>
                              <option value="6" {{ ( '6' == $data['bedrooms']) ? 'selected' : '' }}>6</option>
                              <option value="7" {{ ( '7' == $data['bedrooms']) ? 'selected' : '' }}>7</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-8" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Bathrooms</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" multiple="" name="bathrooms">
                              <option>Choose how much.</option>
                              <option value="1" {{ ( '1' == $data['bath']) ? 'selected' : '' }}>1</option>
                              <option value="2" {{ ( '2' == $data['bath']) ? 'selected' : '' }}>2</option>
                              <option value="3" {{ ( '3' == $data['bath']) ? 'selected' : '' }}>3</option>
                              <option value="4" {{ ( '4' == $data['bath']) ? 'selected' : '' }}>4</option>
                              <option value="5" {{ ( '5' == $data['bath']) ? 'selected' : '' }}>5</option>
                              <option value="6" {{ ( '6' == $data['bath']) ? 'selected' : '' }}>6</option>
                              <option value="7" {{ ( '7' == $data['bath']) ? 'selected' : '' }}>7</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-9" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Structure type</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick"><select name="structure_type" class="selectpicker" multiple="">
                              <option>Apartments</option>
                              <option>Bungalow</option>
                              <option>Houses</option>
                              <option>Loft</option>
                              <option>Office</option>
                              <option>Townhome</option>
                              <option>Villa</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-10" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Floors no</label>
                        <div class="location-area">
                          <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" multiple="" name="floors_no">
                              <option value="1st" {{ ( '1st' == $data['floors_no']) ? 'selected' : '' }}>1st</option>
                              <option value="2nd" {{ ( '2nd' == $data['floors_no']) ? 'selected' : '' }}>2nd</option>
                              <option value="3rd" {{ ( '3rd' == $data['floors_no']) ? 'selected' : '' }}>3rd</option>
                              <option value="4th" {{ ( '4th' == $data['floors_no']) ? 'selected' : '' }}>4th</option>
                              <option value="5th" {{ ( '5th' == $data['floors_no']) ? 'selected' : '' }}>5th</option>
                              <option value="6th" {{ ( '6th' == $data['floors_no']) ? 'selected' : '' }}>6th</option>
                              <option value="7th" {{ ( '7th' == $data['floors_no']) ? 'selected' : '' }}>7th</option>
                            </select>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-11" tabindex="-1" aria-multiselectable="true">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="mb20">
                        <label class="heading-color ff-heading fw600 mb10">Owner/ Agent nots (not visible on front end)</label>
                        <textarea cols="30" rows="5" placeholder="There are many variations of passages." name="nots" value="{{$data['description']}}"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-sm-flex justify-content-between">
                        <a class="ud-btn btn-white" href="#0">Prev Step<i class="fal fa-arrow-right-long"></i></a>
                        <a class="ud-btn btn-dark" href="#nav-item5">Next Step<i class="fal fa-arrow-right-long"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-item5" role="tabpanel" aria-labelledby="nav-item5-tab">
              <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                <h4 class="title fz17 mb30">Select Amenities</h4>
                <div class="row" id="radioButtonsContainer">


                  @php
                  $features_amenities = DB::table('features_amenities')->get();
                  $features_amenities = json_decode($features_amenities, true);
                  $properties_features_amenities_id = DB::table('properties_features_amenities')->where('property_id',$data['id'])->get();
                  $properties_features_amenities_id = json_decode($properties_features_amenities_id,true);
                  @endphp
                  @foreach ($features_amenities as $features_ameniti)
                  <div class="col-sm-6 col-lg-3 col-xxl-2">
                    <div class="checkbox-style1">
                      <label class="custom_checkbox" style=""> {{$features_ameniti['name']}}
                        <input value="{{$features_ameniti['id']}}" @foreach($properties_features_amenities_id as $properties_features_amenity) {{$properties_features_amenity['feature_id'] == $features_ameniti['id']  ? 'checked' : ''}} @endforeach type="checkbox" name="amenities[]">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="col-md-12 mt30">
                  <div class="d-sm-flex justify-content-between">
                    <a class="ud-btn btn-white" href="#0">Prev Step<i class="fal fa-arrow-right-long"></i></a>
                    <button type="submit" class="ud-btn btn-thm">Register<i class="fal fa-arrow-right-long"></i></button>

                  </div>
                </div>
              </div>
            </div>
            </form>
            <div class="col-xl-12">
            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 pt30 mb30 overflow-hidden position-relative">
            <style>
                .wrapper_ai {
                    background-color: #fff;
                    /*padding: 25px;*/
                    border-radius: 5px;
                    width: 100%;
                    max-width: 100%;
                    /*margin: 50px auto;*/
                    align-self: center;
                    box-sizing: border-box;
                }

                .header_ai {
                    border-bottom: 1px solid #ddd;
                    margin-bottom: 20px;
                    display: flex;
                }

                .h1_ai {
                    flex: 1;
                    padding: 0;
                    margin: 0;
                    font-size: 16px;
                    letter-spacing: 1px;
                    font-weight: 700;
                    color: #7A7B7F;
                }

                .header_ai span {
                    flex: 1;
                    text-align: right;
                    font-size: 12px;
                    color: #999;
                }

                .ways ul {
                    display: flex;
                    list-style: none;
                    padding: 0;
                    border-radius: 5px;
                    overflow: hidden;
                }

                .ways li {
                    align-self: center;
                    flex: 1;
                    background-color: #F5F7FA;
                    text-align: center;
                    cursor: pointer;
                    padding: 15px 0;
                    color: #999;
                    text-transform: uppercase;
                    font-weight: 500;
                    font-size: 12px;
                    letter-spacing: 1px;
                    border: 1px solid #ddd;
                }

                .ways li:first-child {
                    border-right: 0;
                }

                .ways li:last-child {
                    border-left: 0;
                }

                .ways li.active {
                    border: 2px solid #1AA1E5;
                    color: #66676C;
                }

                .ways li.active::before {
                    content: '\f00c';
                    font-family: 'fontawesome';
                    color: #1AA1E5;
                }

                .ways li:not(.active) {
                    padding: 16px 0;
                }

                .section_ai {
                    display: none;
                    /*padding:50px !important;*/
                }

                .section_ai.active {
                    display: block;
                }

                section input {
                    display: block;
                    width: 100%;
                    box-sizing: border-box;
                    border: 1px solid #ddd;
                    outline: 0;
                    background-color: #F5F7FA;
                    padding: 10px;
                    margin-bottom: 10px;
                    letter-spacing: 1.4px;
                }


                .select-option {
                    background-color: #F5F7FA;
                    color: #999;
                    font-size: 15px;
                    position: relative;
                    cursor: pointer;
                }

                .select-option::before {
                    content: '\f107';
                    font-family: 'fontawesome';
                    position: absolute;
                    right: 0;
                    top: 0;
                    margin-top: 9px;
                    margin-right: 10px;
                    font-size: 20px;
                }

                .select-option div:not(.option) {
                    padding: 10px 10px;
                    border: 1px solid #ddd;
                }

                .select-option div:last-child,
                .select-option .head {
                    border-bottom: 1px solid #ddd;
                }

                .select-option .option {
                    display: none;
                }

                .select-option .option div {
                    text-transform: capitalize;
                }

                .select-option.active .option {
                    display: block;
                    position: absolute;
                    width: 100%;
                    background-color: #F5F7FA;
                    box-sizing: border-box;
                    padding: 0;
                    margin-top: -1px;
                    z-index: 2;
                }

                .select-option .option div {
                    border-bottom: 0;
                }

                .images {
                    display: flex;
                    justify-content: center;
                    flex-wrap: wrap;
                    margin-top: 20px;
                }

                .images .img,
                .images .pic {
                    flex-basis: 31%;
                    margin-bottom: 10px;
                    border-radius: 4px;
                }

                .images .img {
                    width: 112px;
                    height: 93px;
                    background-size: cover;
                    margin-right: 10px;
                    background-position: center;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    position: relative;
                    overflow: hidden;
                }

                .images .img:nth-child(3n) {
                    margin-right: 0;
                }

                .images .img span {
                    display: none;
                    text-transform: capitalize;
                    z-index: 2;
                }

                .images .img::after {
                    content: '';
                    width: 100%;
                    height: 100%;
                    transition: opacity .1s ease-in;
                    border-radius: 4px;
                    opacity: 0;
                    position: absolute;
                }

                .images .img:hover::after {
                    display: block;
                    background-color: #000;
                    opacity: .5;
                }

                .images .img:hover span {
                    display: block;
                    color: #fff;
                }

                .images .pic {
                    background-color: #F5F7FA;
                    align-self: center;
                    text-align: center;
                    padding: 40px 0;
                    text-transform: uppercase;
                    color: #848EA1;
                    font-size: 12px;
                    cursor: pointer;
                }

                @media  screen and (max-width: 400px) {
                    .wrapper_ai {
                        margin-top: 0;
                    }

                    .header_ai {
                        flex-direction: column;
                    }

                    .header_ai span {
                        text-align: left;
                        margin-top: 10px;
                    }

                    .ways li,
                    section input,
                    .select-option .head,
                    .select-option .option div {
                        font-size: 8px;
                    }

                    .images .img,
                    .images .pic {
                        flex-basis: 100%;
                        margin-right: 0;
                    }
                }

                .wrapper_ai .footer ul {
                    margin: 0;
                    margin-top: 30px;
                    display: flex;
                    list-style: none;
                    padding: 0;
                }

                .wrapper_ai .footer ul li {
                    flex: 1;
                }

                .wrapper_ai .footer li span {
                    text-transform: capitalize;
                    cursor: pointer;
                }

                .wrapper_ai .footer li:first-child {
                    color: #999;
                    text-align: left;
                    font-size: 12px;
                }

                .wrapper_ai .footer li:first-child span {
                    display: inline-block;
                    border-bottom: 1px solid #ddd;
                }

                .wrapper_ai .footer li:last-child {
                    text-align: right;
                }

                .wrapper_ai .footer li:last-child span {
                    background-color: #103b2e;
                    padding: 10px 20px;
                    color: #fff;
                    border-radius: 3px;
                }

                .notification {
                    position: absolute;
                    left: 20px;
                    bottom: 20px;
                    top: auto;
                    right: auto;
                }

                .notification p {
                    margin: 0;
                    padding: 0;
                }

                .notification .btn {
                    padding: 16px 20px;
                    border-radius: 5px;
                    display: flex;
                    margin-bottom: 10px;
                    font-size: 12px;
                    align-items: center;
                    animation: fadeIn .4s ease-in;
                }

                @keyframes  fadeIn {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }

                .notification .btn::before {
                    margin-right: 12px;
                    font-family: 'fontawesome';
                    font-size: 15px;
                }

                .notification span {
                    margin-left: 10px;
                    cursor: pointer;
                    flex: 1;
                    text-align: right;
                }

                .notification .error {
                    background-color: #ECC8C5;
                    border: 1px solid #BD8181;
                }

                .notification .error span {
                    color: #C79995;
                }

                .notification .error::before {
                    content: '\f05c';
                    color: #B2312F;

                }

                .notification .success {
                    background-color: #DEF2D6;
                    border: 1px solid #B3CEA9;
                }

                .notification .success span {
                    color: #AFC7A7;
                }

                .notification .success::before {
                    content: '\f00c';
                    color: #5A7052;
                }

                .footer {
                    text-align: center;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                    color: #fff;
                    font-size: 12px;
                }

                .footer a {
                    color: #fff;
                    text-decoration: none;
                    border-bottom: 1px solid #fff;
                    padding-bottom: 5px;
                }



                .container_img {
                    width: 100%;
                    height: 100%;
                }

                .input_file {
                    padding: 10px;
                    /*background:#2d2d2d;*/

                }

                .container_img {
                    border-radius: 10px;
                }






                .radio-with-Icon {
                    display: block;
                    text-align: center;


                }

                .radio-with-Icon h5 {
                    display: block;
                    text-align: left;


                }

                .radio-with-Icon p.radioOption-Item {
                    display: inline-block;
                    width: 100px;
                    height: 100px;
                    box-sizing: border-box;
                    margin: 10px 10px 0px 10px;
                    border: none;
                }

                .radio-with-Icon p.radioOption-Item label {
                    display: block;
                    height: 100%;
                    width: 100%;
                    /*padding: 10px;*/
                    border-radius: 10px;
                    border: 2px solid #181a20;
                    color: #181a20;
                    cursor: pointer;
                    opacity: .8;
                    transition: none;
                    font-size: 13px;
                    /*padding-top: 25px;*/
                    text-align: center;
                    margin: 0 !important;
                }

                .radio-with-Icon p.radioOption-Item label:hover,
                div.radio-with-Icon p.radioOption-Item label:focus,
                div.radio-with-Icon p.radioOption-Item label:active {
                    opacity: .5;
                    background-color: #181a20;
                    color: #fff;
                    margin: 0 !important;
                }

                .radio-with-Icon p.radioOption-Item label::after,
                div.radio-with-Icon p.radioOption-Item label:after,
                div.radio-with-Icon p.radioOption-Item label::before,
                div.radio-with-Icon p.radioOption-Item label:before {
                    opacity: 0 !important;
                    width: 0 !important;
                    height: 0 !important;
                    margin: 0 !important;
                }

                .radio-with-Icon p.radioOption-Item label i.fa {
                    display: block;
                    font-size: 0px;
                }

                .radio-with-Icon p.radioOption-Item input[type="radio"] {
                    opacity: 0 !important;
                    width: 0 !important;
                    height: 0 !important;
                }

                .radio-with-Icon p.radioOption-Item input[type="radio"]:active~label {
                    opacity: 1;
                }

                .radio-with-Icon p.radioOption-Item input[type="radio"]:checked~label {
                    opacity: 1;
                    border: 5px solid #181a20;
                    background-color: #181a20;
                    color: #fff;
                }

                .radio-with-Icon p.radioOption-Item input[type="radio"]:hover,
                div.radio-with-Icon p.radioOption-Item input[type="radio"]:focus,
                div.radio-with-Icon p.radioOption-Item input[type="radio"]:active {
                    margin: 0 !important;
                }

                .radio-with-Icon p.radioOption-Item input[type="radio"]+label:before,
                div.radio-with-Icon p.radioOption-Item input[type="radio"]+label:after {
                    margin: 0 !important;
                }

                .body {
                    display: none;
                }
            </style>
            <div class="body">
                <div class="wrapper_ai dashboard_title_area">
                    
                    <div class="sections">
                        <form method="POST" id="ai_rnd" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-md-8">
                                    <div class="header_ai">
                                <h2 class="title fz17 mb30 px-5">Ask our AI to generate image</h2>
                                </div>
                                    <div class="radio-with-Icon my-5">
                                        <!--<h4 class="title fz17 mb30" style=" text-align: left;">ROOM TPYE</h4>-->
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType1" value="house" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
                                            <label for="BannerType1">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/house.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>House</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType2" vlaue="bedroom" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
                                            <label for="BannerType2">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/bedroom.jpeg" alt="Girl in a jacket">
                                            </label>
                                            <span>Bedroom</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType3" class="ng-valid ng-dirty ng-touched ng-empty" value="study" aria-invalid="false" style="">
                                            <label for="BannerType3">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/office_small_office.jpeg" alt="Girl in a jacket">
                                            </label>
                                            <span>Study</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType4" class="ng-valid ng-dirty ng-touched ng-empty" value="Kitchen" aria-invalid="false" style="">
                                            <label for="BannerType4">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Kitchen.jpeg" alt="Girl in a jacket">
                                            </label>
                                            <span>Kitchen</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType5" class="ng-valid ng-dirty ng-touched ng-empty" value="garden" aria-invalid="false" style="">
                                            <label for="BannerType5">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/garden.jpg" alt="Girl in a jacket">
                                            </label>
                                            <span>Garden</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType6" class="ng-valid ng-dirty ng-touched ng-empty" value="Bathroom" aria-invalid="false" style="">
                                            <label for="BannerType6">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/washroom.jpeg" alt="Girl in a jacket">
                                            </label>
                                            <span>Bathroom</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp" id="BannerType7" class="ng-valid ng-dirty ng-touched ng-empty" value="living room" aria-invalid="false" style="">
                                            <label for="BannerType7">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/groom.jpeg" alt="Girl in a jacket">
                                            </label>
                                            <span>Living room</span>

                                        </p>
                                    </div>

                                    <div class="radio-with-Icon">
                                        <!--<h5>Design style</h5>-->
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType8" value="Contemporary" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
                                            <label for="BannerType8">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Contemporary.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Contemporary</span>
                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType9" vlaue="Bohemian" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
                                            <label for="BannerType9">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Bohemian.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Bohemian</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType10" class="ng-valid ng-dirty ng-touched ng-empty" value="Minimalist" aria-invalid="false" style="">
                                            <label for="BannerType10">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Minimalist.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Minimalist</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType11" class="ng-valid ng-dirty ng-touched ng-empty" value="Modern" aria-invalid="false" style="">
                                            <label for="BannerType11">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Modern.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Modern</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType12" class="ng-valid ng-dirty ng-touched ng-empty" value="Sweet" aria-invalid="false" style="">
                                            <label for="BannerType12">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Sweet.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Sweet</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType13" class="ng-valid ng-dirty ng-touched ng-empty" value="Tropical" aria-invalid="false" style="">
                                            <label for="BannerType13">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Tropical.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Tropical</span>

                                        </p>
                                        <p class="radioOption-Item">
                                            <input type="radio" name="BrTyp1" id="BannerType14" class="ng-valid ng-dirty ng-touched ng-empty" value="Vintage " aria-invalid="false" style="">
                                            <label for="BannerType14">
                                                <i class="fa fa-image"></i>
                                                <img class="container_img" src="https://bazhouse.com/portal/public/assets/images/Vintage.webp" alt="Girl in a jacket">
                                            </label>
                                            <span>Vintage</span>

                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2 mt-5" style="padding:10px; background-color: #eeeeee; margin-top: 1px!important; display: flex; justify-content: center; width: 100%;">
                                            <img class="ai_img1" style="width:100%; border-radius: 20px;" id="blah" src="{{ asset('assets/images/180.png') }}" alt="">
                                    </div>
                                    <div class="mt-2">
                                        <input class="input_file form-control" id="ai_img" type="file" name="up_img" onchange="readURL(this);" accept="image/png, image/JPEG,, image/PNG, image/jpg, image/JPG, image/jpeg" required="">
                                    </div>
                                    <div class="mt-2">
                                        <input style=" padding: 10px 20px; width:100%;" class="ud-btn btn-dark" type="button" id="submit" value="Generate image" name="submit" disabled="">
                                    </div>
                                    <div class="mt-2" style="display:none;">
                                        <input placeholder="Enter Text" style="width:100%;" type="text" name="prompt_text" class="mt-3 form-control">
                                    </div>
                                </div>
                                
                                
                            </div>
                            <hr class="px-5">
                            <div class="active section_ai">
                                <div class="row px-5" id="ai_success_img">
                                </div>
                            </div>
                        </form>
                </div>
                </div>
                <div class="notification"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script>
            (function($) {
                $(document).ready(function() {

                    generateID()
                    choose()
                    generateOption()
                    selectionOption()
                    removeClass()
                    uploadImage()
                    submit()
                    resetButton()
                    removeNotification()
                    autoRemoveNotification()
                    autoDequeue()

                    var ID
                    var way = 0
                    var queue = []
                    var fullStock = 10
                    var speedCloseNoti = 1000

                    function generateID() {
                        var text = $('header span')
                        var newID = ''

                        for (var i = 0; i < 3; i++) {
                            newID += Math.floor(Math.random() * 3)
                        }

                        // ID = 'ID: 5988' + newID
                        // text.html(ID)
                    }

                    function choose() {
                        var li = $('.ways li')
                        var section = $('.sections section')
                        var index = 0
                        li.on('click', function() {
                            index = $(this).index()
                            $(this).addClass('active')
                            $(this).siblings().removeClass('active')

                            section.siblings().removeClass('active')
                            section.eq(index).addClass('active')
                            if (!way) {
                                way = 1
                            } else {
                                way = 0
                            }
                        })
                    }

                    function generateOption() {
                        var select = $('select option')
                        var selectAdd = $('.select-option .option')
                        $.each(select, function(i, val) {
                            $('.select-option .option').append('<div rel="' + $(val).val() + '">' + $(val)
                                .html() + '</div>')
                        })
                    }

                    function selectionOption() {
                        var select = $('.select-option .head')
                        var option = $('.select-option .option div')

                        select.on('click', function(event) {
                            event.stopPropagation()
                            $('.select-option').addClass('active')
                        })

                        // option.on('click', function() {
                        //     var value = $(this).attr('rel')
                        //     $('.select-option').removeClass('active')
                        //     select.html(value)

                        //     $('select#category').val(value)
                        // })
                    }

                    function removeClass() {
                        $('.body').on('click', function() {
                            $('.select-option').removeClass('active')
                        })
                    }

                    // function uploadImage() {
                    //     var button = $('.images .pic')
                    //     var uploader = $('<input type="file"  name="uploded_image"  accept="image/*" />')
                    //     var images = $('.images')

                    //     button.on('click', function() {
                    //         uploader.click()
                    //     })

                    //     uploader.on('change', function() {
                    //         var reader = new FileReader()
                    //         reader.onload = function(event) {
                    //             images.prepend('<div class="img" style="background-image: url(\'' +
                    //                 event.target.result + '\');" rel="' + event.target.result +
                    //                 '"><span>remove</span></div>')
                    //         }
                    //         reader.readAsDataURL(uploader[0].files[0])

                    //     })

                    //     images.on('click', '.img', function() {
                    //         $(this).remove()
                    //     })

                    // }

                    function submit() {
                        var button = $('#send')

                        button.on('click', function() {
                            if (!way) {
                                var title = $('#title')
                                var cate = $('#category')
                                var images = $('.images .img')
                                var imageArr = []


                                for (var i = 0; i < images.length; i++) {
                                    imageArr.push({
                                        url: $(images[i]).attr('rel')
                                    })
                                }

                                var newStock = {
                                    title: title.val(),
                                    category: cate.val(),
                                    images: imageArr,
                                    type: 1
                                }

                                saveToQueue(newStock)
                            } else {
                                // discussion
                                var topic = $('#topic')
                                var message = $('#msg')

                                var newStock = {
                                    title: topic.val(),
                                    message: message.val(),
                                    type: 2
                                }

                                saveToQueue(newStock)
                            }
                        })
                    }

                    function removeNotification() {
                        var close = $('.notification')
                        close.on('click', 'span', function() {
                            var parent = $(this).parent()
                            parent.fadeOut(300)
                            setTimeout(function() {
                                parent.remove()
                            }, 300)
                        })
                    }

                    function autoRemoveNotification() {
                        setInterval(function() {
                            var notification = $('.notification')
                            var notiPage = $(notification).children('.btn')
                            var noti = $(notiPage[0])

                            setTimeout(function() {
                                setTimeout(function() {
                                    noti.remove()
                                }, speedCloseNoti)
                                noti.fadeOut(speedCloseNoti)
                            }, speedCloseNoti)
                        }, speedCloseNoti)
                    }

                    function autoDequeue() {
                        var notification = $('.notification')
                        var text

                        setInterval(function() {

                            if (queue.length > 0) {
                                if (queue[0].type == 2) {
                                    text = ' Your discusstion is sent'
                                } else {
                                    text = ' Your order is allowed.'
                                }

                                notification.append(
                                    '<div class="success btn"><p><strong>Success:</strong>' + text +
                                    '</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>'
                                )
                                queue.splice(0, 1)

                            }
                        }, 10000)
                    }

                    function resetButton() {
                        var resetbtn = $('#reset')
                        resetbtn.on('click', function() {
                            reset()
                        })
                    }

                    // helpers
                    function saveToQueue(stock) {
                        var notification = $('.notification')
                        var check = 0

                        if (queue.length <= fullStock) {
                            if (stock.type == 2) {
                                if (!stock.title || !stock.message) {
                                    check = 1
                                }
                            } else {
                                if (!stock.title || !stock.category || stock.images == 0) {
                                    check = 1
                                }
                            }

                            if (check) {
                                notification.append(
                                    '<div class="error btn"><p><strong>Error:</strong> Please fill in the form.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>'
                                )
                            } else {
                                notification.append('<div class="success btn"><p><strong>Success:</strong> ' + ID +
                                    ' is submitted.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>'
                                )
                                queue.push(stock)
                                reset()
                            }
                        } else {
                            notification.append(
                                '<div class="error btn"><p><strong>Error:</strong> Please waiting a queue.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>'
                            )
                        }
                    }

                    function reset() {

                        $('#title').val('')
                        $('.select-option .head').html('Image Strength')
                        $('select#category').val('')

                        var images = $('.images .img')
                        for (var i = 0; i < images.length; i++) {
                            $(images)[i].remove()
                        }

                        var topic = $('#topic').val('')
                        var message = $('#msg').val('')
                    }
                })
            })(jQuery)
        </script>
    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection
@push('scripts')

<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#uploadFile').filemanager('file');
    })
</script>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



  
  
  
  $(document).ready(function(){
       $('#submit').click(function(event) {
            // Define the image URL
            var imgURL = "{{ asset('assets/images/loading.gif') }}";


            var $img = $("<div><img src='" + imgURL + "' style='margin-top: 20px; width: 120px; margin-bottom: 20px;' /></div><br><h3>Loading with AI...</h3>");
            
            var $containerDiv = $("<div></div>").addClass("col-md-4 upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2 loading_ai_div").css({
                  "flex-direction": "column",
                  "background-color": "#eeeeee",
                  "display": "flex",
                  "justify-content": "center"
                });

            $('.loading_ai_div').hide();

            $containerDiv.append($img);


            $("#ai_success_img").append($containerDiv);
            event.preventDefault();
            var form = document.getElementById('ai_rnd');
            var formData = new FormData(form);
            var error_generated = '';
            var files = $('#ai_img')[0].files[0];
            formData.append('file', files);
            //   $('#ai_img').val('');

            $.ajax({
                url: '/ai_rendering/index.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var responseData = JSON.parse(response);
                    console.log(response);
                    var targetElement = $('#ai_success_img');
                    responseData.forEach(function(response_data) {
                    if (response_data.error) {
                     var targetElement = $('#ai_success_img');
                        $containerDiv.hide();

                        htmlContent = '<div class="col-md-4 error_ai"><div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2 mt-5" style="padding:10px; background-color: #eeeeee; margin-top: 1px!important; display: flex; justify-content: center; width: 100%;">' + response_data.error + '</div></div>';
                        // var targetElement = $('#ai_success_img');

                        // targetElement.html(htmlContent);
                    } else {
                            var targetElement = $('#ai_success_img');
                            $containerDiv.hide();
                            $(".error_ai").hide();

                            var htmlContent = '<div class="col-md-4"><div class="sinistra upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2 mt-5" style="padding:10px; background-color: #eeeeee; margin-top: 4px!important; display: flex; justify-content: center; width: 100%;">' + response_data.img + '<div  class="fz12 list-tag "><span class="flaticon-electricity me-2"></span>SELECTED</div></div></div>';
                            
                        
                    }
                    targetElement.append(htmlContent);
                });


                },
                error: function(xhr, status, error) {
                    alert('Your form was not sent successfully.');
                    console.error(error);
                }
            });

        });
        
        
      
        
        
                         
    
    
        
        
        
        
        
        
      
      
  })
  
    var imagesArray = [];

function image_srec_get() {
    var image = $(event.target);
    var image_src = image.attr("src");
    
    if (image.hasClass("selected")) {
        image.removeClass("selected");
        image.closest(".sinistra").css('border', "none");
        image.closest(".sinistra").find('.fz12').hide();
        var index = imagesArray.indexOf(image_src);
        if (index > -1) {
            imagesArray.splice(index, 1);
        }
    } else {
        image.addClass("selected");
        image.closest(".sinistra").css('border', "4px solid #31564b");
        image.closest(".sinistra").find('.fz12').show();
        imagesArray.push(image_src);
    }
    
    console.log(imagesArray);
    $('#ai_generated_images').val(imagesArray);
}

    $(document).ready(function() {
        $("#nav-item1-tab").click(function() {
            $(".body").hide();
        });
        
         $("#nav-item2-tab").click(function() {
            $(".body").show();
        });
        $("#nav-item3-tab").click(function() {
            $(".body").hide();
        });
        
         $("#nav-item4-tab").click(function() {
            $(".body").hide();
        });
        $("#nav-item5-tab").click(function() {
            $(".body").hide();
        });
        
        
        

        $("#submit").click(function() {
            $(this).val("Regenerate Image");

        });


    });
    
    
    
    $(document).ready(function() {
      const fileInput = $('#ai_img');
      const submitButton = $('#submit');
    
      fileInput.on('change', function() {
        if (fileInput[0].files.length > 0) {
          submitButton.prop('disabled', false);
        } else {
          submitButton.prop('disabled', true);
        }
      });
    });
    
$(document).ready(function() {
    $(".tag-del").click(function(){
        var $this = $(this); 
       var imgSrc = $this.closest('.profile-img').find('img.orignal_propert_img').attr('src');
         var filename = imgSrc.split('/').pop();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route('updated_img_del') }}',
            method: 'POST',
            data: {
                'filename': filename,
                '_token': csrfToken
            },
            success: function(response) {
                
               var selected = $this.closest('.profile-img').find('img.orignal_propert_img');
                    selected.attr('src', response); 
                    selected.hide(); 
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error: " + status + " - " + error);
            }
        });
    });
});




    
                $(document).ready(function() {
                $("#get_country_id").change(function() {
                    var selected_dropdown_country = $(this).val();
                    var selectHTML4 = ""; // Declare the variable here
            
                    $.ajax({
                        url: '{{ route('city') }}',
                        type: 'post',
                        data: {
                            "country_id": selected_dropdown_country,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data && data.length > 0) {
                                selectHTML4 = '<select class="selectpicker" name="city_id" list="your-data-list">'; 
                                data.forEach(function(item) {
                                    
                                    selectHTML4 += '<option value="' + item.id + '">' + item.name + '</option>';
                                });
                                selectHTML4 += '</select>';
            
                                $('#city').html(selectHTML4);
            
                                $('#city select').selectpicker(); 
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error); 
                        }
                    });
                });
            });


  

  
</script>

