@extends('frontend.layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('frontend/css/service.css')}}" />

@endsection
@section('content')
<main>
        <section class="service-banner" style="background:url({{ url($service->image)}})">
            <h2>{{!empty($service) ? $service->service_name:''}}</h2>
        </section>
        <section class="service-landing">
            <div class="container">
                <div class="breadcrumbs py-4">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Service</li>
                            <li class="breadcrumb-item active" aria-current="page">{{!empty($service) ? $service->service_name:''}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="branding-desc">
                    <div class="branding-content">
                        <div class="branding-title">
                            <h4 class="branding-h">{{!empty($service) ? $service->service_name:''}}</h4>
                        </div>
                        <div class="branding-cont pt-4">
                           {!! !empty($service) ? $service->big_description:'' !!}
                        </div>
                    </div>
                </div>
                <!-- our-services -->
                <div class="our-services mt-5">
                    <div class="service-title">
                        <h2 class="service-h">Our Services</h2>
                        <div class="service-content pt-5 pb-3">
                            <div class="row">
                             @foreach($sub_services as $sub_service)
                                <div class="col-lg-4 col-md-6 pt-3">
                                    <div class="service-cont">
                                        <div class="service-img">
                                            <img class="service-icon" src="{{asset($sub_service->image)}}"
                                                alt="">
                                        </div>
                                        <div class="service-desc">
                                            <p>{{$sub_service->subservice_name}}</p>
                                            <span>{{$sub_service->description}}</span>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- our-service end -->
        </section>
        <div class="gallery py-5">
            <h2 class="gallery-h">Gallery</h2>
            <!-- Slider main container -->
            <div class="gallery-container mt-5">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                 @foreach($galleries as $gallery)
                    <div class="swiper-slide">
                        <a href="{{asset($gallery->image)}}" data-fancybox="gallery">
                            <img class="slider-img" src="{{asset($gallery->image)}}" />
                        </a>
                    </div>
                  @endforeach
                
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>

        <div class="our-videos py-5">
            <h2 class="our-video-h">Our Videos</h2>
            <div class="swiper-container pt-5">
                <div class="swiper-wrapper pt-5">
                @foreach($videos as $video)
                    <div class="swiper-slide">
                        <img class="video-img" src="{{asset($video->image)}}" alt="">
                        <a class="youtube-btn" href="{{$video->youtube_link}}" target="_blank">
                             <img class="video-btn" src="{{asset('frontend\img\slider-icon\yt-icon.png')}}" alt=""> </a>
                    </div>
                 @endforeach  

                   
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </main>
     
@endsection