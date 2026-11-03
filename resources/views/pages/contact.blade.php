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
    <!-- Start Contact Section -->
    <div class="cs_height_112 cs_height_lg_70"></div>
    <div class="container">
      <div class="row cs_gap_y_40">
        <div class="col-lg-6">
          <h2 class="cs_section_title cs_fs_48 cs_semibold cs_mb_32">Have Questions? We're <br> Here to Help!</h2>
          <ul class="cs_contact_info">
            <li class="mb-0">
              <h3 class="cs_fs_20 cs_body_color cs_normal cs_mb_8">Email</h3>
              <a href="mailto:info@@viewlightstudio.com" class="cs_fs_20 cs_semibold cs_heading_color mb-0">info@@viewlightstudio.com</a>
            </li>
            <li class="mb-0">
              <h3 class="cs_fs_20 cs_body_color cs_normal cs_mb_8">Call Us</h3>
              <a href="tel:1234567890" class="cs_heading_color cs_fs_20 cs_semibold  mb-0">(123) 456-7890</a>
            </li>
            <li class="mb-0">
              <h3 class="cs_fs_20 cs_body_color cs_normal cs_mb_8">Location</h3>
              <p class="cs_heading_color cs_fs_20 cs_semibold mb-0">123 Innovation Street, Suite 500 Fintech City, State, 56789</p>
            </li>
            <li class="mb-0">
              <p class="cs_fs_20 cs_normal cs_mb_8">Follow Us</p>
              <div class="cs_social_btns cs_style_1 cs_accent_color">
                <a href="#" class="cs_center">
                  <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="#" class="cs_center">
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="cs_center">
                  <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="cs_center">
                  <i class="fa-brands fa-linkedin-in"></i>
                </a>
              </div>
            </li>
          </ul>
          <div class="cs_height_32 cs_height_lg_32"></div>
          <div class="cs_map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.49929845124!2d90.25487052696046!3d23.781067241102527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1771824189700!5m2!1sen!2sbd"></iframe>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs_pl_40">
            <form action="{{ route('contact.send') }}" method="POST" class="cs_contact_form" id="cs_contact">
              @csrf
              <div class="cs_form_input_wrapper">
                <label for="name" class="cs_medium cs_heading_color_2">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" required class="cs_form_field cs_radius_8 cs_normal" autocomplete="name">
              </div>
              <div class="cs_form_input_wrapper">
                <label for="email" class="cs_medium cs_heading_color_2">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required
                  class="cs_form_field cs_radius_8 cs_normal" autocomplete="email">
              </div>
              <div class="cs_form_input_wrapper">
                <label for="phone" class="cs_medium cs_heading_color_2">Phone Number (Optional)</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your mobile number"
                  class="cs_form_field cs_radius_8 cs_normal">
              </div>
              <div class="cs_form_input_wrapper">
                <label for="subject" class="cs_medium cs_heading_color_2">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject" required
                  class="cs_form_field cs_radius_8 cs_normal">
              </div>
              <div class="cs_form_input_wrapper">
                <label for="message" class="cs_medium cs_heading_color_2">Message</label>
                <textarea name="message" id="message" rows="4" class="cs_form_field cs_radius_8 cs_normal" placeholder="Enter your message">{{ old('message') }}</textarea>
              </div>
              <div class="cs_form_input_wrapper">
                <button type="submit" class="cs_btn cs_style_1 cs_semibold"><span class="cs_btn_text cs_white_color">
                  <span>Send Message</span>
                </span>
                </button>
                <div class="mt-2">@if(session('success'))<p style="color:#16a34a">{{ session('success') }}</p>@endif @foreach($errors->all() as $e)<p style="color:#dc2626">{{ $e }}</p>@endforeach</div>
              </div>
            </form>            
          </div>
        </div>
      </div>
    </div>
    <div class="cs_height_112 cs_height_lg_70"></div>
    <!-- End Contact Section -->
    <!-- Start FAQ Section -->
    <section class="cs_gray_bg_2">
      <div class="cs_height_112 cs_height_lg_70"></div>
      <div class="container">
        <div class="text-center">
          <p class="cs_badge cs_fs_16 cs_accent_color cs_semibold cs_white_bg cs_mb_16 wow fadeInDown">FAQ</p>
          <h2 class="cs_fs_62 cs_heading_color text-capitalize wow fadeInDown mb-0">Your concerns, answered</h2>
          <div class="cs_height_64 cs_height_lg_50"></div>
        </div>
        <ul class="cs_faq_table cs_mp_0">
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How secure is Paynext?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">We use state-of-the-art encryption to ensure your data is safe.</p>
          </li>
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Can I cancel my plan anytime?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Yes, you can cancel your plan anytime without any penalties.</p>
          </li>
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Does Paynext support international transactions?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">How can I get a quote?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Contact us through our booking form or call us to discuss your needs and receive a personalized quote.</p>
          </li>
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Are there any hidden fees?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">No, we believe in transparent pricing. All fees are clearly outlined in your plan details.</p>
          </li>
          <li>
            <h3 class="cs_question cs_fs_24 cs_accent_color cs_mb_16">Is Paynext suitable for small businesses?</h3>
            <p class="cs_answer cs_fs_18 cs_body_color mb-0">Absolutely! Paynext is designed to support businesses of all sizes, from startups to large enterprises.</p>
          </li>
        </ul>
      </div>
      <div class="cs_height_112 cs_height_lg_70"></div>
    </section>
    <!-- End FAQ Section -->
    <!-- Start CTA Section -->
    <div class="cs_height_64 cs_height_lg_50"></div>
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
