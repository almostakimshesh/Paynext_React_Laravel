<!-- Start Preloader -->
    <div class="cs_preloader">
      <div class="cs_preloader_in">
        <span></span>
        <span></span>
      </div>
      <div class="cs_preloader_text">Loading...</div>
    </div>
    <!-- End Preloader -->
<!-- Start Header Section -->
    <header class="cs_site_header cs_style_1 cs_white_color cs_sticky_header">
      <div class="cs_main_header">
        <div class="container">
          <div class="cs_main_header_in">
            <div class="cs_main_header_left">
              <a class="cs_site_branding" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
              </a>
            </div>
            <div class="cs_main_header_center">
              <div class="cs_nav">
                <nav class="cs_nav_list_wrap text-capitalize">
                  <ul class="cs_nav_list cs_fs_16 cs_medium">
                    <li class="{{ request()->routeIs('home*') ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ request()->routeIs('about*') ? 'current-menu-item' : '' }}"><a href="{{ route('about') }}">About</a></li>
                    <li class="{{ request()->routeIs('blog*') ? 'current-menu-item' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="{{ request()->routeIs('contact*') ? 'current-menu-item' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="cs_main_header_right">
              <a href="{{ route('dashboard') }}" class="cs_btn cs_style_1 cs_semibold cs_heading_color cs_white_bg wow fadeInUp">
                <span>Dashboard</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Section -->