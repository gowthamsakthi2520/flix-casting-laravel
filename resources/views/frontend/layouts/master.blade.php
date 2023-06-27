<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flix Casting</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.css'>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
    <link rel="icon" type="image/png" href="{{asset('frontend/img/favicon.png')}}" />
    <meta name="robots" content="noindex" />
    @yield('style')
    <!-- font -->

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <section class="header-section">
      <header class="header-container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a href="index.html" class="navbar-brand logo">
              <img src="{{asset('frontend/img/logo.png')}}" alt=""
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-menus" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="{{url('/')}}"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('services_page')}}">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('audition_page')}}">Audition</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact_page')}}">Contact Us</a>
                </li>
                <li class="register-btn"><a href="#">Register</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </section>

    @yield('content')
    @php
    $footer_img="{{asset('frontend/img/footer-banner.png')}}";
    @endphp
    <section
      class="footer"
      style="background-image:url({{asset('frontend/img/footer-banner.png')}}); background-size: cover; background-repeat: no-repeat;"
    >
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- mobile responsive -->
          <div class="col-12 footer-mob-img py-5">
              <div class="footer-logo-mob">
                <img class="footer-logo-mob" src="{{asset('frontend/img/logo.png')}}" />
              </div>
          </div>
          <div class="footer-mobile col-md-3">
            <div class="footer-content-mob">
              <h6>Links</h6>
              <ul>
                <li>Terms & Conditions</li>
                <li>Privacy Policy</li>
                <li>Disclaimer</li>
              </ul>
            </div>
          </div>
          <!-- mobile responsive end -->

          <div class="col-md-3 footer-desc d-flex justify-content-between">
            <div class="footer-logo foot-logo">
              <img src="{{asset('frontend/img/footer-logo.png')}}" />
            </div>
            <div class="footer-content">
              <h6>Links</h6>
              <ul>
                <li>Terms & Conditions</li>
                <li>Privacy Policy</li>
                <li>Disclaimer</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 footer-m">
            <div class="footer-mob footer-content border-start border-end padd-content">
              <h6>Our Services</h6>
               @php 
                  $list_services=\App\Models\Services::get();
               @endphp
              <ul>
                @foreach($list_services as $list)
                <a href="{{url('services').'/'.$list->slug}}"><li>{{$list->service_name}}</li></a>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="footer-content padd-content">
              <h6>Contact Us</h6>
              <ul>
                <li>
                  <a href="mailto:support@flixcasting.com"
                    >support@flixcasting.com</a
                  >
                </li>
                <p>
                  We are located at this place. You can email us any time and we
                  will get back to you
                </p>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="footer-content">
              <h6>Social Media</h6>
              <ul class="social">
                <li><img src="{{asset('frontend/img/Facebook.png')}}" /></li>
                <li><img src="{{asset('frontend/img/Twitter.png')}}" /></li>
                <li><img src="{{asset('frontend/img/Search.png')}}" /></li>
                <li><img src="{{asset('frontend/img/Youtube.png')}}" /></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 foot-text">
            <p>
              At Flixcasting, we help talents reach their haven. From finding
              jobs, to offering resources and creating events, we bring you
              every new way to get yourself found in the industry. This platform
              is all up for artists, events industry professionals and the
              casting people to find work, get flourished and communicate.
            </p>
          </div>
          <div class="col-md-9 text-center text-white pt-4 copyright">
            <p>
              © 2023 Flixcasting, Inc. All rights reserved
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Legal
            </p>
          </div>
        </div>
      </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.js'></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js'></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
  </body>
</html>