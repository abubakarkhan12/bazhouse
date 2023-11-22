@extends('layouts.app')

@section('content')

    <!--<div class="row">-->
    <!--    <div class="col-xl-3 col-md-6">-->
    <!--        <div class="card card-stats">-->
                <!-- Card body -->
    <!--            <div class="card-body">-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>-->
    <!--                        <span class="h2 font-weight-bold mb-0">350,897</span>-->
    <!--                    </div>-->
    <!--                    <div class="col-auto">-->
    <!--                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">-->
    <!--                            <i class="ni ni-active-40"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <p class="mt-3 mb-0 text-sm">-->
    <!--                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
    <!--                    <span class="text-nowrap">Since last month</span>-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-md-6">-->
    <!--        <div class="card card-stats">-->
                <!-- Card body -->
    <!--            <div class="card-body">-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>-->
    <!--                        <span class="h2 font-weight-bold mb-0">2,356</span>-->
    <!--                    </div>-->
    <!--                    <div class="col-auto">-->
    <!--                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">-->
    <!--                            <i class="ni ni-chart-pie-35"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <p class="mt-3 mb-0 text-sm">-->
    <!--                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
    <!--                    <span class="text-nowrap">Since last month</span>-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-md-6">-->
    <!--        <div class="card card-stats">-->
                <!-- Card body -->
    <!--            <div class="card-body">-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>-->
    <!--                        <span class="h2 font-weight-bold mb-0">924</span>-->
    <!--                    </div>-->
    <!--                    <div class="col-auto">-->
    <!--                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">-->
    <!--                            <i class="ni ni-money-coins"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <p class="mt-3 mb-0 text-sm">-->
    <!--                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
    <!--                    <span class="text-nowrap">Since last month</span>-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-md-6">-->
    <!--        <div class="card card-stats">-->
                <!-- Card body -->
    <!--            <div class="card-body">-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>-->
    <!--                        <span class="h2 font-weight-bold mb-0">49,65%</span>-->
    <!--                    </div>-->
    <!--                    <div class="col-auto">-->
    <!--                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">-->
    <!--                            <i class="ni ni-chart-bar-32"></i>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <p class="mt-3 mb-0 text-sm">-->
    <!--                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
    <!--                    <span class="text-nowrap">Since last month</span>-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


    <!--{{-- ============= --}}-->


    <!--    <div class="row">-->
    <!--      <div class="col-xl-8">-->
    <!--        <div class="card">-->
    <!--          <div class="card-header border-0">-->
    <!--            <div class="row align-items-center">-->
    <!--              <div class="col">-->
    <!--                <h3 class="mb-0">Page visits</h3>-->
    <!--              </div>-->
    <!--              <div class="col text-right">-->
    <!--                <a href="#!" class="btn btn-sm btn-primary">See all</a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="table-responsive">-->
                <!-- Projects table -->
    <!--            <table class="table align-items-center table-flush">-->
    <!--              <thead class="thead-light">-->
    <!--                <tr>-->
    <!--                  <th scope="col">Page name</th>-->
    <!--                  <th scope="col">Visitors</th>-->
    <!--                  <th scope="col">Unique users</th>-->
    <!--                  <th scope="col">Bounce rate</th>-->
    <!--                </tr>-->
    <!--              </thead>-->
    <!--              <tbody>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    /dashboard/-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    4,569-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    340-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    /dashboard/index.html-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    3,985-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    319-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    /dashboard/charts.html-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    3,513-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    294-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    /dashboard/tables.html-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    2,050-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    147-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    /dashboard/profile.html-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    1,795-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    190-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--              </tbody>-->
    <!--            </table>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-xl-4">-->
    <!--        <div class="card">-->
    <!--          <div class="card-header border-0">-->
    <!--            <div class="row align-items-center">-->
    <!--              <div class="col">-->
    <!--                <h3 class="mb-0">Social traffic</h3>-->
    <!--              </div>-->
    <!--              <div class="col text-right">-->
    <!--                <a href="#!" class="btn btn-sm btn-primary">See all</a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="table-responsive">-->
                <!-- Projects table -->
    <!--            <table class="table align-items-center table-flush">-->
    <!--              <thead class="thead-light">-->
    <!--                <tr>-->
    <!--                  <th scope="col">Referral</th>-->
    <!--                  <th scope="col">Visitors</th>-->
    <!--                  <th scope="col"></th>-->
    <!--                </tr>-->
    <!--              </thead>-->
    <!--              <tbody>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    Facebook-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    1,480-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                      <span class="mr-2">60%</span>-->
    <!--                      <div>-->
    <!--                        <div class="progress">-->
    <!--                          <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>-->
    <!--                        </div>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    Facebook-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    5,480-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                      <span class="mr-2">70%</span>-->
    <!--                      <div>-->
    <!--                        <div class="progress">-->
    <!--                          <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>-->
    <!--                        </div>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    Google-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    4,807-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                      <span class="mr-2">80%</span>-->
    <!--                      <div>-->
    <!--                        <div class="progress">-->
    <!--                          <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>-->
    <!--                        </div>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    Instagram-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    3,678-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                      <span class="mr-2">75%</span>-->
    <!--                      <div>-->
    <!--                        <div class="progress">-->
    <!--                          <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>-->
    <!--                        </div>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                  <th scope="row">-->
    <!--                    twitter-->
    <!--                  </th>-->
    <!--                  <td>-->
    <!--                    2,645-->
    <!--                  </td>-->
    <!--                  <td>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                      <span class="mr-2">30%</span>-->
    <!--                      <div>-->
    <!--                        <div class="progress">-->
    <!--                          <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>-->
    <!--                        </div>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                  </td>-->
    <!--                </tr>-->
    <!--              </tbody>-->
    <!--            </table>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->

        <div class="dashboard__main pl0-md">
          <div class="dashboard__content bgc-f7">
            <div class="row">
              <div class="col-lg-12">
                <div class="dashboard_title_area">
                  <h2>Hi, Bazhouse!</h2>
                  <p class="text">We are glad to see you again!</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-xxl-4">
                <div class="d-flex justify-content-between statistics_funfact">
                  <div class="details">
                    <div class="text fz25">All Properties</div>
                   @php
                                $views_sum = DB::table('properties')->sum('views');
                                $views_sum = json_decode($views_sum,true);
                                
                                $property_sum = DB::table('properties')->count();
                                $property_sum = json_decode($property_sum,true);
                                
                                
                                $users_sum = DB::table('users')->count();
                                $users_sum = json_decode($users_sum,true);
                   @endphp
                    
                    
                    <div class="title">{{$property_sum}}  </div>
                  </div>
                  <div class="icon text-center"><i class="flaticon-home"></i></div>
                </div>
              </div>
              <div class="col-sm-4 col-xxl-4">
                <div class="d-flex justify-content-between statistics_funfact">
                  <div class="details">
                    <div class="text fz25">Total Views</div>
                    <div class="title">{{$views_sum}}</div>
                  </div>
                  <div class="icon text-center"><i class="flaticon-search-chart"></i></div>
                </div>
              </div>
              <div class="col-sm-4 col-xxl-4">
                <div class="d-flex justify-content-between statistics_funfact">
                  <div class="details">
                    <div class="text fz25">All User</div>
                    <div class="title">{{$users_sum}}</div>
                  </div>
                  <div class="icon text-center"><i class="flaticon-user"></i></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-5">
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                  <div class="navtab-style1">
                    <div class="d-sm-flex align-items-center justify-content-between">
                      <h4 class="title fz17 mb20">View statistics</h4>
                      <ul class="nav nav-tabs border-bottom-0 mb30" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link fw600 active" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link fw600" id="monthly-tab" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content" id="myTabContent2">
                      <div class="tab-pane fade w-100 show active" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <canvas class="canvas w-100" id="myChartweave"></canvas>
                      </div>
                      <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <div class="chart pt20">
                          <canvas class="w-100" id="myChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                  <div class="navtab-style1">
                    <div class="d-sm-flex align-items-center justify-content-between">
                      <h4 class="title fz17 mb20">Revenue</h4>
                    </div>
                    <div class="tab-content">                      
                      <canvas class="chart-container" id="doublebar-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3">
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                  <h4 class="title fz17 mb25">Recent Activities</h4>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-home flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Your listing <span class="fw600">House on the beverly hills</span> has been approved</p>
                  </div>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-user flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Dollie Horton left a review on <span class="fw600">House on the Northridge</span></p>
                  </div>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-new-tab flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Someone favorites your <span class="fw600">Triple Story House for Rent</span> listing</p>
                  </div>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-user flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Someone favorites your <span class="fw600">Triple Story House for Rent</span> listing</p>
                  </div>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-home flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Your listing <span class="fw600">House on the beverly hills</span> has been approved</p>
                  </div>
                  <div class="recent-activity d-sm-flex align-items-center mb20">
                    <span class="icon me-3 flaticon-user flex-shrink-0"></span>
                    <p class="text mb-0 flex-grow-1">Dollie Horton left a review on <span class="fw600">House on the Northridge</span></p>
                  </div>
                  <div class="d-grid">
                    <a href class="ud-btn btn-white2">Veiw More<i class="fal fa-arrow-right-long"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="dashboard_footer pt30 pb10">
            <div class="container">
              <div class="row items-center justify-content-center justify-content-md-between">
                <div class="col-auto">
                  <div class="copyright-widget">
                           <p class="text">©<script>document.write(/\d{4}/.exec(Date())[0])</script>
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
