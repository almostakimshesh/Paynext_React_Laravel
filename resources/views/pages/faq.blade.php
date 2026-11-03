@extends('layouts.site')
{{-- @section('title')Paynext - Modern Fintech Website HTML Template@endsection --}}
{{-- @section('description')Paynext is a modern, responsive, and feature-rich HTML template for fintech startups, digital banks, crypto platforms, payment gateways, and financial services@endsection --}}
@section('content')
     <!-- Start hero Section -->
    <section class="cs_hero cs_style_1 cs_type_1 cs_heading_bg cs_bg_filed" data-src="{{ asset('assets/img/cta_bg.webp') }}">
      <div class="container">
        <div class="cs_hero_in text-center">
          <h1 class="cs_fs_72 cs_white_color cs_mb_24 text-capitalize wow fadeInDown">We’d Love to <br> Hear from You</h1>
          <p class="cs_section_subtitle cs_light cs_white_color cs_fs_20 mb-0">Reach out to us with your questions, feedback, or partnership inquiries.</p> 
        </div>
      </div>
    </section>
    <!-- End hero Section -->
    <!-- Start FAQ Section -->
    <section>
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <ul class="cs_faq_table cs_mp_0">
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How secure is Paynext?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">We use state-of-the-art encryption to ensure your data is safe.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Can I cancel my plan anytime?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Yes, you can cancel your plan anytime without any penalties.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Does Paynext support international transactions?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How can I get a quote?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Are there any hidden fees?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">No, we believe in transparent pricing. All fees are clearly outlined in your plan details.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Is Paynext suitable for small businesses?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Absolutely! Paynext is designed to support businesses of all sizes, from startups to large enterprises.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How secure is Paynext?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">We use state-of-the-art encryption to ensure your data is safe.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Can I cancel my plan anytime?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Yes, you can cancel your plan anytime without any penalties.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Does Paynext support international transactions?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How can I get a quote?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Are there any hidden fees?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">No, we believe in transparent pricing. All fees are clearly outlined in your plan details.</p>
          </li>
          <li>
            <h2 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Is Paynext suitable for small businesses?</h2>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Absolutely! Paynext is designed to support businesses of all sizes, from startups to large enterprises.</p>
          </li>
        </ul>
      </div>
      <div class="cs_height_112 cs_height_lg_70"></div>
    </section>
    <!-- End FAQ Section -->
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
         <div class="cs_cta_right_in">
           <h3 class="cs_fs_20 cs_white_color cs_semibold cs_mb_16 wow fadeInDown">Office Address</h3>
            <p class="cs_light cs_white_color cs_mb_32 cs_fs_18">123 Innovation Street, Suite 500, Fintech City, State, 56789</p>
            <h3 class="cs_fs_20 cs_white_color cs_semibold cs_mb_16 wow fadeInDown">Contact Info</h3>
            <p class="cs_address cs_mb_16">
              <span class="cs_white_color cs_fs_18"><i class="fa-regular fa-envelope"></i></span>
              <span class="cs_light cs_white_color cs_fs_18">support@@paynext.com</span>
            </p>
            <p class="cs_info mb-0">
              <span class="cs_white_color cs_fs_18"><i class="fa-solid fa-phone"></i></span>
              <span class="cs_light cs_white_color cs_fs_18">+1-800-123-4567</span>
            </p>
         </div>
        </div>
      </div>
    </div>
    <!-- End CTA Section -->    
    @endsection
