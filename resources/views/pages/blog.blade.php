@extends('layouts.site')
{{-- @section('title')Paynext - Modern Fintech Website HTML Template@endsection --}}
{{-- @section('description')Paynext is a modern, responsive, and feature-rich HTML template for fintech startups, digital banks, crypto platforms, payment gateways, and financial services@endsection --}}
@section('content')
    <!-- Start hero Section -->
    <section class="cs_hero cs_style_1 cs_type_1 cs_heading_bg cs_bg_filed" data-src="{{ asset('assets/img/cta_bg.webp') }}">
      <div class="container">
        <div class="cs_hero_in text-center">
          <h1 class="cs_fs_72 cs_white_color cs_mb_24 wow fadeInDown">Stay Updated on <br> Digital Payment</h1>
          <p class="cs_section_subtitle cs_light cs_white_color cs_fs_20 mb-0">Get the latest insights and trends in digital payments, all in one place</p> 
        </div>
      </div>
    </section>
    <!-- End hero Section -->
    <div class="cs_height_112 cs_height_lg_70"></div>
    <div class="container">
      <div class="row cs_gap_y_30">
        <div class="col-lg-6">
          <div class="cs_post_style_2 cs_bg_filed" data-src="{{ asset('assets/img/card_bg_1.webp') }}">
            <div class="cs_overlay"></div>
            <div class="cs_post_card_in">
              <h2 class="cs_card_title cs_white_color cs_fs_32 cs_semibold cs_mb_16">
                <a href="{{ route('blog.details') }}">The Future of Fintech: Trends for 2025</a>
              </h2>
              <p class="cs_card_subtitle cs_white_color cs_fs_18 cs_light cs_mb_16">Discover the latest trends shaping the fintech landscape in 2025. From advanced security features to AI-driven financial tools.</p>
              <div class="cs_post_meta">
                <div class="cs_post_avatar">
                  <span class="cs_post_avatar_icon">
                    <img src="{{ asset('assets/img/avatar_1.webp') }}" alt="meta img">
                  </span>
                  <div class="cs_post_avatar_text cs_white_color cs_fs_16 cs_medium">
                    <span>Sarah Winter</span>
                    <span>Jan 1, 2025</span>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_semibold cs_heading_color cs_white_bg wow fadeInUp">
                  <span>Fintech</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs_post_style_2 cs_bg_filed" data-src="{{ asset('assets/img/card_bg_2.webp') }}">
            <div class="cs_overlay"></div>
            <div class="cs_post_card_in">
              <h2 class="cs_card_title cs_white_color cs_fs_32 cs_semibold cs_mb_16">
                <a href="{{ route('blog.details') }}">Why Security Matters in Digital Payments</a>
              </h2>
              <p class="cs_card_subtitle cs_white_color cs_fs_18 cs_light cs_mb_16">Discover the latest trends shaping the fintech landscape in 2026. From advanced security features to AI-driven financial tools.</p>
              <div class="cs_post_meta">
                <div class="cs_post_avatar">
                  <span class="cs_post_avatar_icon">
                    <img src="{{ asset('assets/img/avatar_2.webp') }}" alt="meta img">
                  </span>
                  <div class="cs_post_avatar_text cs_white_color cs_fs_16 cs_medium">
                    <span>Taylor Waltz</span>
                    <span>Dec 20, 2026</span>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_semibold cs_heading_color cs_white_bg wow fadeInUp">
                  <span>Security</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Blog Section -->
    <div class="cs_height_112 cs_height_lg_70"></div>
    <div class="container">
      <div class="text-center">
        <h2 class="cs_section_title cs_fs_48 cs_heading_color wow fadeInDown mb-0">All Articles</h2>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
      <div class="row cs_gap_y_32">
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_4.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">Fintech Tips</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">5 Ways to Improve Your Financial Habits</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Dec 28, 2026</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_5.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">Budgeting</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">Master Your Budget in 3 Simple Steps</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Dec 15, 2026</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_6.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">Technology</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">How AI is Revolutionizing Personal Finance</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Nov 30, 2026</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_7.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">Financial Planning</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">The Ultimate Guide to Smart Financial Planning</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Nov 20, 2026</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_8.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">Business</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">Scaling Your Business with Digital Payments</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Nov 10, 2026</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cs_post_style_1">
            <a href="{{ route('blog.details') }}" class="cs_post_thumb cs_mb_24">
              <img src="{{ asset('assets/img/post_img_9.webp') }}" alt="Post">
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_medium cs_accent_color cs_mp_0">
                <li> <a href="{{ route('blog.details') }}">User Stories</a></li>
              </ul>
              <h2 class="cs_post_title cs_semibold cs_fs_20 cs_mb_8">
                <a href="{{ route('blog.details') }}">How Paynext Helped Small Businesses Thrive</a>
              </h2>
              <p class="cs_date cs_normal cs_fs_18 mb-0">Oct 25, 2026</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_height_112 cs_height_lg_70"></div>
    <!-- End Blog Section -->
    <!-- Start CTA Section -->
    <div class="container">
      <div class="cs_cta cs_style_1 cs_heading_bg cs_bg_filed" data-src="{{ asset('assets/img/cta_bg.webp') }}">
        <div class="cs_height_64 cs_height_lg_50"></div>
        <div class="cs_cta_in text-center">
          <p class="cs_badge cs_fs_16 cs_white_color cs_medium cs_mb_16">Best Transaction Platform</p>
          <h2 class="cs_cta_title cs_fs_72 cs_white_color cs_mb_32 wow fadeInDown">Ready to Elevate Your <br> Financial Game?</h2>
          <p class="cs_section_subtitle cs_light cs_white_color cs_mb_32 cs_fs_20">Discover how Paynext can transform your finances with cutting-edge solutions.</p>
          <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_semibold cs_heading_color cs_white_bg wow fadeInUp">
            <span>Learn More</span>
          </a>  
        <div class="cs_height_64 cs_height_lg_50"></div>
        </div>
      </div>
    </div>
    <!-- End CTA Section -->
    @endsection
