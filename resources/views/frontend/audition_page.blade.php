@extends('frontend.layouts.master')
@section('content')
<section class="banner-page">
      <div class="landing-banner">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">

            @foreach($banners as $key => $banner)
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}" aria-current="{{$key == 0 ?'true':''}}" aria-label="Slide {{$key+1}}"></button>
            @endforeach
          </div>
          <div class="carousel-inner">

           @foreach($banners as $key => $banner)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
              <img src="{{asset($banner->banner_images)}}" class="d-block w-100 carousel-img" alt="...">
              <div class="container-fluid">
                <div class="carousel-caption text-start">
                  <h2>
                    {{$banner->banner_title}}
                    <span></span></h2>
                  <p>
                     {{$banner->banner_description}}
                  </p>
                  <div class="banner-btn-container">
                    <a href="#" class="graybtn color-white border-white">Register</a>
                    <a href="#" class="graybtn color-orange border-orange"
                      >Learn More</a
                    >
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button> -->
        </div>
      </div>
    </section>
    <section class="bottom-landing">
      <div class="container">
        <div class="row home-abuout-section">
          <div class="col-md-5">
            <img src="{{asset('frontend/img/reelimage.png')}}" alt="" class="img-fluid" />
          </div>
          <div class="col-md-7">
            <div class="home-about">
              <h2 class="title pt-3">About us</h2>
              <p class="pt-4">
                Flix Casting is an on-line platform to become-an Actor, Model,
                Director, Choreographer, movie maker, lyricist, singer etc.
              </p>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book.
              </p>
              <p>
                Many desktop publishing packages and web page editors now use
                Lorem Ipsum as their default model text, and a search for 'lorem
                ipsum' will uncover many web sites still in their infancy.
                Various versions have evolved over the years, sometimes by
                accident
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="service-digital">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title-service pt-5 mt-5 mb-5 text-white">
                Our Services
              </h2>
            </div>
          @foreach($services as $key=>$service)
          @if($key<2)
            <div class="col-md-6 mb-5">
              <div class="service-section">
                <div class="d-flex justify-content-between align-items-center">
                  <h5>{{$key+1}}</h5>
                  <h6 class="title-1">{{$service->service_name}}</h6>
                </div>
                <p>
                    {{$service->service_description}}
                </p>
                <a href="{{url('services').'/'.$service->slug}}" class="btn theme-btn">View All</a>
              </div>
            </div>
            @endif
            @endforeach

          </div>
          <div class="row mb-5">
            <div class="digital-banner">
              <img src="{{asset('frontend/img/digital-banner.jpg')}}" />
              <div class="digital-content">
                <h3>Digital <span>Marketing</span></h3>
              </div>
            </div>
          </div>
        <div class="row">
          @foreach($services as $key=>$service)
          @if($key>=2)
            <div class="col-md-6 mb-5">
              <div class="service-section">
                <div class="d-flex justify-content-between align-items-center">
                  <h5>{{$key+1}}</h5>
                  <h6 class="title-1">{{$service->service_name}}</h6>
                </div>
                <p>
                    {{$service->service_description}}
                </p>
                <a href="{{url('services').'/'.$service->slug}}" class="btn theme-btn">View All</a>
              </div>
            </div>
            @endif
            @endforeach
        </div>
        </div>
      </div>
      <!-- </div> -->
    </section>

    <section class="casting">
      <div class="container mw-100">
        <div class="row">
          <!-- <div class="col-lg-5 position-relative">
                <img src="">
            </div> -->
          <div class="col-lg-7 offset-lg-5">
            <div class="casting-content">
              <h2>Movie Auditions & Film <span>Casting Calls</span></h2>
              <div class="badge-point d-flex mt-4">
                <p>Future Film</p>
                <p>General Staff + Crew</p>
                <p>Student Film</p>
              </div>
              <div class="flix">
                <p>
                  Searching for movie auditions? Apply to nearly 10000 casting
                  calls and auditions on Backstage. Join and get cast in a movie
                  today!
                </p>
                <a href="#" class="btn white-btn my-5">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="partner pb-50">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center pt-50 pb-30">
            <h2>Trusted by 50+ Companies</h2>
          </div>
          <div class="brand">
            <img src="{{asset('frontend/img/brand/image 7.png')}}" />
            <img src="{{asset('frontend/img/brand/image 10.png')}}" />
            <img src="{{asset('frontend/img/brand/image 2.png')}}" />
            <img src="{{asset('frontend/img/brand/image 14.png')}}" />
            <img src="{{asset('frontend/img/brand/image 5.png')}}" />
            <img src="{{asset('frontend/img/brand/image 6.png')}}" />
            <img src="{{asset('frontend/img/brand/image 12.png')}}" />
            <img src="{{asset('frontend/img/brand/image 4.png')}}" />
            <img src="{{asset('frontend/img/brand/image 11.png')}}" />
            <img src="{{asset('frontend/img/brand/image 3.png')}}" />
            <img src="{{asset('frontend/img/brand/image 8.png')}}" />
            <img src="{{asset('frontend/img/brand/image 15.png')}}" />
            <img src="{{asset('frontend/img/brand/image 16.png')}}" />
          </div>
        </div>
      </div>
    </section>
    @endsection