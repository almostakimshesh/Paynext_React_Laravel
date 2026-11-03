@extends('layouts.site')
{{-- @section('title')Paynext - Modern Fintech Website HTML Template@endsection --}}
{{-- @section('description')Paynext is a modern, responsive, and feature-rich HTML template for fintech startups, digital banks, crypto platforms, payment gateways, and financial services@endsection --}}
@section('content')

     <!-- Start hero Section -->
    <section class="cs_hero cs_style_1 cs_type_1 cs_heading_bg cs_bg_filed" data-src="{{ asset('assets/img/cta_bg.webp') }}">
      <div class="container">
        <div class="cs_hero_in text-center">
          <h1 class="cs_fs_72 cs_white_color cs_mb_24 wow fadeInDown">Empowering <br> Financial Freedom</h1>
          <p class="cs_section_subtitle cs_light cs_white_color cs_fs_20 mb-0">Transforming the way people manage money with innovation, security, and trust.</p> 
        </div>
      </div>
    </section>
    <!-- End hero Section -->
    <!-- Start Vision Section -->
    <section>
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <div class="row cs_gap_x_64 cs_gap_y_30 align-items-center">
          <div class="col-lg-6">
            <img class="cs_radius_24 w-100" src="{{ asset('assets/img/vision_card_img.webp') }}" alt="">
          </div>
          <div class="col-lg-6">
            <div class="cs_vision_card_text">
              <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_gray_bg_2 cs_mb_16 wow fadeInDown">Vision</p>
              <h2 class="cs_fs_48 cs_mb_32 text-capitalize wow fadeInDown">Our vision is to be the leading global fintech solution</h2>
              <p class="cs_fs_18 cs_normal mb-0">We empowering individuals and businesses to achieve financial clarity and success. We strive to foster a world where managing money is simple, secure, and accessible to all.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <div class="row cs_gap_x_64 cs_gap_y_30 align-items-center">
          <div class="col-lg-6">
            <div class="cs_vision_card_text">
              <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_gray_bg_2 cs_mb_16 wow fadeInDown">Mission</p>
              <h2 class="cs_fs_48 cs_mb_32 text-capitalize wow fadeInDown">Our mission is to <br> Simplifying Finance with Secure Technology</h2>
              <p class="cs_normal cs_fs_18 mb-0">We aim to build tools that enable users to gain clarity and control over <br> their finances while promoting trust and innovation. By cultivating a customer-centric approach, we ensure that every individual and business can achieve long-term financial stability and success.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <img class="cs_radius_24 w-100" src="{{ asset('assets/img/mission_card_img.webp') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <div class="cs_height_112 cs_height_lg_70"></div>
    <!-- End Vision Section -->
    <!-- Start Counter Section -->
     <div class="cs_white_bg">
      <hr>
      <div class="cs_height_64 cs_height_lg_50"></div>
      <div class="container">
        <div class="cs_funfact_wrapper cs_light_gray_bg cs_radius_15 wow fadeInUp">
          <div class="cs_funfact cs_style_1 cs_center_column">
            <div class="cs_fs_62 cs_semibold cs_center cs_heading_color">
              <span class="odometer" data-count-to="99"></span>
              <span>%</span>
            </div>
            <p class="cs_fs_18 mb-0">Transaction Success Rate</p>
          </div>
          <div class="cs_funfact cs_style_1 cs_center_column">
            <div class="cs_fs_62 cs_semibold cs_center cs_heading_color">
              <span>$</span>
              <span class="odometer" data-count-to="12,000"></span>
              <span>+</span>
            </div>
            <p class="cs_fs_18 mb-0">Average User Savings</p>
          </div>
          <div class="cs_funfact cs_style_1 cs_center_column">
            <div class="cs_fs_62 cs_semibold cs_center cs_heading_color">
              <span class="odometer" data-count-to="85"></span>
              <span>%</span>
            </div>
            <p class="cs_fs_18 mb-0">Improved Financial Growth</p>
          </div>
          <div class="cs_funfact cs_style_1 cs_center_column">
            <div class="cs_fs_62 cs_semibold cs_center cs_heading_color">
              <span class="odometer" data-count-to="50"></span>
              <span class="cs_fs_62">K</span>
              <span>+</span>
            </div>
            <p class="cs_fs_18 mb-0"> Active Users Worldwide</p>
          </div>
        </div>
      </div>
      <div class="cs_height_64 cs_height_lg_50"></div>
      <hr>
      <div class="cs_height_112 cs_height_lg_70"></div>
    </div>
    <!-- End Counter Section -->
    <!-- Start Value Section -->
     <section>
      <div class="container">
        <div class="cs_hero_in text-center">
          <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_gray_bg_2 cs_mb_16 wow fadeInDown">Our Core Value</p>
          <h2 class="cs_fs_48 cs_heading_color text-capitalize wow fadeInDown mb-0">The Foundation of Paynext</h2>
          <div class="cs_height_64 cs_height_lg_50"></div> 
        </div>
        <div class="row cs_gap_x_32  cs_gap_y_30">
          <div class="col-lg-3 col-sm-6">
            <div class="cs_value_card">
              <div class="cs_icon cs_gray_bg_2 cs_center cs_mb_24">
                <img src="{{ asset('assets/img/value_icon_1.svg') }}" alt="Icon">
              </div>
              <h3 class="cs_card_title cs_fs_24 cs_mb_24">Innovation</h3>
              <p class="cs_card_subttile cs_fs_18 mb-0">We continuously create cutting-edge financial tools.</p>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_value_card">
              <div class="cs_icon cs_gray_bg_2 cs_center cs_mb_24">
                <img src="{{ asset('assets/img/value_icon_2.svg') }}" alt="Icon">
              </div>
              <h3 class="cs_card_title cs_fs_24 cs_mb_24">Integrity</h3>
              <p class="cs_card_subttile cs_fs_18 mb-0">Transparency and trust are at the core of everything we do.</p>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_value_card">
              <div class="cs_icon cs_gray_bg_2 cs_center cs_mb_24">
                <img src="{{ asset('assets/img/value_icon_3.svg') }}" alt="Icon">
              </div>
              <h3 class="cs_card_title cs_fs_24 cs_mb_24">Customer-Centricity</h3>
              <p class="cs_card_subttile cs_fs_18 mb-0">Our users' success is our top priority.</p>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_value_card">
              <div class="cs_icon cs_gray_bg_2 cs_center cs_mb_24">
                <img src="{{ asset('assets/img/value_icon_4.svg') }}" alt="Icon">
              </div>
              <h3 class="cs_card_title cs_fs_24 cs_mb_24">Security</h3>
              <p class="cs_card_subttile cs_fs_18 mb-0">Ensuring the safety of your data and transactions.</p>
            </div>
          </div>
        </div>
      </div>
     </section>
     <div class="cs_height_112 cs_height_lg_70"></div>
    <!-- End Value Section -->    
    <!-- Start Team Member Section -->
    <section class="cs_gray_bg_2">
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <div class="cs_team_in text-center">
          <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_white_bg cs_mb_16 wow fadeInDown">Our Teams</p>
          <h1 class="cs_fs_48 cs_heading_color text-capitalize wow fadeInDown mb-0">Meet the Team Behind <br> PayNext's Innovation</h1>
          <div class="cs_height_64 cs_height_lg_50"></div>
        </div>
        <div class="row cs_gap_x_32 cs_gap_y_30">
          <div class="col-lg-3 col-sm-6">
            <div class="cs_team_style_1">
              <div class="cs_member_thumb cs_mb_24">
                <img src="{{ asset('assets/img/member_img_1.webp') }}" alt="Member" class="w-100">
              </div>
              <div class="cs_member_info text-start">
                <h2 class="cs_member_name cs_fs_24 cs_mb_8">Charles Moore</h2>
                <div class="cs_member_designation cs_fs_18 mb-0">Chief Executive Officer</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_team_style_1">
              <div class="cs_member_thumb cs_mb_24">
                <img src="{{ asset('assets/img/member_img_2.webp') }}" alt="Member" class="w-100">
              </div>
              <div class="cs_member_info text-start">
                <h2 class="cs_member_name cs_fs_24 cs_mb_8">Daniella Vista</h2>
                <div class="cs_member_designation cs_fs_18 mb-0">Chief Executive Officer</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_team_style_1">
              <div class="cs_member_thumb cs_mb_24">
                <img src="{{ asset('assets/img/member_img_3.webp') }}" alt="Member" class="w-100">
              </div>
              <div class="cs_member_info text-start">
                <h2 class="cs_member_name cs_fs_24 cs_mb_8">Evan Wong</h2>
                <div class="cs_member_designation cs_fs_18 mb-0">Chief Financial Officer</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="cs_team_style_1">
              <div class="cs_member_thumb cs_mb_24">
                <img src="{{ asset('assets/img/member_img_4.webp') }}" alt="Member" class="w-100">
              </div>
              <div class="cs_member_info text-start">
                <h2 class="cs_member_name cs_fs_24 cs_mb_8">Farah Medina</h2>
                <div class="cs_member_designation cs_fs_18 mb-0">Head of Customer Success</div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="cs_height_112 cs_height_lg_70"></div>
    </section>
    <!-- End Team Member Section -->
    <!-- Start Brand Section -->
    <section>
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <div class="cs_team_in text-center">
          <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_gray_bg_2 cs_mb_16 wow fadeInDown">Partners</p>
          <h1 class="cs_fs_48 cs_heading_color text-capitalize wow fadeInDown mb-0">Trusted by Leading <br> Financial Institutions</h1>
          <div class="cs_height_64 cs_height_lg_50"></div>
        </div>
        <div class="cs_brand_section_style_1 cs_slider cs_slider_gap_104">
          <div class="container">
            <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="800" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
              <div class="cs_slider_wrapper">
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_1.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_2.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_3.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_4.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_5.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_1.svg') }}" alt="brand logo">
                  </div>
                </div>
                <div class="cs_slide">
                  <div class="cs_brand cs_center">
                    <img src="{{ asset('assets/img/client_2.svg') }}" alt="brand logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cs_height_112 cs_height_lg_70"></div>  
    </section>  
    <!-- End Brand Section -->
    <!-- Start CTA Section -->
    <div class="container">
      <div class="cs_cta_style_2 cs_heading_bg cs_bg_filed position-relative" data-src="{{ asset('assets/img/cta_bg.webp') }}">
        <div class="cs_cta_left">
          <div class="cs_cta_left_in">
            <h2 class="cs_fs_48 cs_white_color cs_mb_32 wow fadeInDown">Let’s Redefine Finance Together</h2>
            <p class="cs_light cs_white_color cs_mb_32 cs_fs_20">Connect with us to start your financial journey today.</p>
            <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_semibold cs_heading_color cs_white_bg wow fadeInUp">
              <span>Contact Us</span>
            </a>
          </div>
        </div>
        <div class="cs_contact_img">
          <div class="cs_img_outline">
            <img src="{{ asset('assets/img/contact_img.webp') }}" alt="Phone interface">
          </div>
        </div>
        <div class="cs_cta_right">
         <ul class="cs_cta_contact_list cs_mp_0">
           <li>
            <h3 class="cs_fs_20 cs_white_color cs_semibold mb-0 wow fadeInDown">Office Address</h3>
            <p class="cs_light cs_white_color cs_fs_18 mb-0">123 Innovation Street, Suite 500, Fintech City, State, 56789</p>
           </li>
           <li>
             <h3 class="cs_fs_20 cs_white_color cs_semibold mb-0 wow fadeInDown">Contact Info</h3>
             <p class="cs_address mb-0">
              <span class="cs_white_color cs_fs_18"><i class="fa-regular fa-envelope"></i></span>
              <a href="mailto:support@@paynext.com" class="cs_light cs_white_color cs_fs_18">support@@paynext.com</a>
             </p>
             <p class="cs_info mb-0">
              <span class="cs_white_color cs_fs_18"><i class="fa-solid fa-phone"></i></span>
              <a href="tel:+18001234567" class="cs_light cs_white_color cs_fs_18">+1-800-123-4567</a>
             </p>
           </li>
         </ul>
        </div>
      </div>
    </div>
    <!-- End CTA Section -->   
    @endsection
