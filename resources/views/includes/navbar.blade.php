<style>
    #loom-companion-mv3{
        display:none!important;
    }
</style>
<div class="wrapper">
  <!--<div class="preloader"></div>-->
  
  <!-- Main Header Nav -->
  <header class="header-nav nav-innerpage-style menu-home4 dashboard_header main-menu">
    <!-- Ace Responsive Menu -->
    <nav class="posr"> 
      <div class="container-fluid pr30 pr15-xs pl30 posr menu_bdrt1">
        <div class="row align-items-center justify-content-between">
          <div class="col-6 col-lg-auto">
            <div class="text-center text-lg-start d-flex align-items-center">
              <div class="dashboard_header_logo position-relative me-2 me-xl-5">
                <a class="logo" href="{{ route('home') }}" data-toggle="tooltip" data-original-title="{{ setting('company_name') }}">
                    
                    <img alt="{{ setting('company_name') }}"
                        width = "200"
                        src="{{ asset('assets/images/logo.png')}}">
                  
                </a>
              </div>
              <div class="fz20 ms-2 ms-xl-5">
                <a href="#" class="dashboard_sidebar_toggle_icon text-thm1 vam"><img src="fonts/dark-nav-icon.svg" alt></a>
              </div>
            </div>
          </div>
        
          <div class="col-6 col-lg-auto">
            <div class="text-center text-lg-end header_right_widgets">
              <ul class="mb0 d-flex justify-content-center justify-content-sm-end p-0">
                <li class="d-none d-sm-block"><a class="text-center mr20 notif" href="#" data-bs-toggle="dropdown"><span class="flaticon-bell"></span></a></li>
                <li class="user_setting">
                  <div class="dropdown">
                    <a class="btn" href="#" data-bs-toggle="dropdown">
                      <img src=" {{ asset('assets/images/user.png') }}" alt="user.png"> 
                    </a>
                    <div class="dropdown-menu">
                      <div class="user_setting_content">
                        <p class="fz15 fw400 ff-heading mb20">MAIN</p>
                        <a class="dropdown-item active" href="{{ route('home') }}"><i class="flaticon-discovery mr10"></i>Dashboard</a>
                        <p class="fz15 fw400 ff-heading mt30">MANAGE PLATFORM</p>
                        <a class="dropdown-item" href="{{ route('add_property') }}"><i class="flaticon-new-tab mr10"></i>Add New Property</a>
                        <a class="dropdown-item" href="{{ route('properties') }}"><i class="flaticon-home mr10"></i>All Properties</a>
                        <a class="dropdown-item" href="{{ route('blog') }}"><i class="flaticon-new-tab mr10"></i>Blog</a>
                        <a class="dropdown-item" href="{{ route('pages') }}"><i class="flaticon-new-tab mr10"></i>Pages</a>
                        <a class="dropdown-item" href="{{ route('users') }}"><i class="flaticon-user mr10"></i>Users</a>
                        <a class="dropdown-item" href="{{ route('revenue') }}"><i class="flaticon-user mr10"></i>Revenue</a>
                        <a class="dropdown-item" href="{{ route('crm') }}"><i class="flaticon-user mr10"></i>CRM</a>
                        <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                        <a class="dropdown-item" href="change-password.html"><i class="flaticon-protection mr10"></i>Change Password</a>
                        <a class="dropdown-item" href="{{ route('edit_account') }}"><i class="flaticon-user mr10"></i>Edit Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="flaticon-logout mr10"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  
  <!-- Mobile Nav  -->
  <div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
      <div class="header innerpage-style">
        <div class="menu_and_widgets">
          <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
            <a class="mobile_logo" href="{{ route('home') }}"><img src="images/logo.png" alt="logo" width="150"></a>
            <div class="user_setting">
              <div class="dropdown">
                <a class="btn" href="#" data-bs-toggle="dropdown">
                  <img src="images/user.png" alt="user.png"> 
                </a>
                <div class="dropdown-menu">
                  <div class="user_setting_content">
                    <p class="fz15 fw400 ff-heading mb20">MAIN</p>
                    <a class="dropdown-item active" href="{{ route('home') }}"><i class="flaticon-discovery mr10"></i>Dashboard</a>
                    <p class="fz15 fw400 ff-heading mt30">MANAGE PLATFORM</p>
                    <a class="dropdown-item " href="{{ route('add_property') }}"><i class="flaticon-new-tab mr10"></i>Add New Property</a>
                    <a class="dropdown-item" href="{{ route('properties') }}"><i class="flaticon-home mr10"></i>All Properties</a>
                    <a class="dropdown-item" href="{{ route('blog') }}"><i class="flaticon-new-tab mr10"></i>Blog</a>
                    <a class="dropdown-item" href="{{ route('pages') }}"><i class="flaticon-new-tab mr10"></i>Pages</a>
                    <a class="dropdown-item" href="{{ route('users') }}"><i class="flaticon-user mr10"></i>Users</a>
                    <a class="dropdown-item" href="{{ route('revenue') }}"><i class="flaticon-user mr10"></i>Revenue</a>
                    <a class="dropdown-item" href="{{ route('crm') }}"><i class="flaticon-user mr10"></i>CRM</a>
                    <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                    <a class="dropdown-item" href="change-password.html"><i class="flaticon-protection mr10"></i>Change Password</a>
                    <a class="dropdown-item" href="{{ route('edit_account') }}"><i class="flaticon-user mr10"></i>Edit Account</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="flaticon-logout mr10"></i>Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">
      <div class="dashboard__sidebar d-none d-lg-block">
          <div class="dashboard_sidebar_list">
            <div class="sidebar_list_item">
                         <a class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}" href="{{route('home')}}">
                            <i class="flaticon-discovery mr15"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>

                
              <!--<a href="index.html" class="items-center -is-active"><i class="flaticon-discovery mr15"></i>Dashboard</a>-->
            </div>
            <p class="fz15 fw400 ff-heading mt30">MANAGE PLATFORM</p>
            <div class="sidebar_list_item ">
              <a href="{{ route('add_property') }}" class="items-center"><i class="flaticon-new-tab mr15"></i>Add New Property</a>
            </div>
            <div class="sidebar_list_item ">
              <a href="{{ route('properties') }}" class="items-center"><i class="flaticon-home mr15"></i>All Properties</a>
            </div>
            
            
            <div class="sidebar_list_item ">
              <a href="{{ route('ai_rendering') }}" class="items-center"><i class="flaticon-user mr15"></i>AI Render</a>
            </div>
            
            
            <div class="sidebar_list_item ">
              <a href="{{ route('blog') }}" class="items-center"><i class="flaticon-new-tab mr15"></i>Blog</a>
            </div>
            <div class="sidebar_list_item ">
              <a href="{{ route('pages') }}" class="items-center"><i class="flaticon-new-tab mr15"></i>Pages</a>
            </div>
            <div class="sidebar_list_item ">
              <a href="{{ route('users') }}" class="items-center"><i class="flaticon-user mr15"></i>Users</a>
            </div>
            <div class="sidebar_list_item ">
              <a href="{{ route('crm') }}" class="items-center"><i class="flaticon-user mr15"></i>CRM</a>
            </div>
            <div class="sidebar_list_item ">
              <a href="{{ route('revenue') }}" class="items-center"><i class="flaticon-user mr15"></i>Revenue</a>
            </div>
            <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
            <div class="sidebar_list_item ">
              <a href="change-password.html" class="items-center"><i class="flaticon-protection mr15"></i>Change Password</a>
            </div>
            <div class="sidebar_list_item ">
                
              <a href="{{ route('edit_account') }}" class="items-center"><i class="flaticon-user mr15"></i>Edit Account</a>
            </div>
             @can('update-settings')
                        <li class="sidebar_list_item">
                            <a class="nav-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{route('settings.index')}}">
                                <i class="flaticon-settings mr15"></i>
                                <span class="nav-link-text">Manage Settings</span>
                            </a>
                        </li>
            @endcan
            <div class="sidebar_list_item ">
              <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="flaticon-logout mr15"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
            </div>
           
          </div>
        </div>