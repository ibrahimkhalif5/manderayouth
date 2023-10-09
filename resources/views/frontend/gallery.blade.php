@extends('frontend.layouts.main')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('front/images/bg_2.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Our Gallery</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>gallery <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Our Gallery</span>

            </div>
        </div>

    </div>
</section>
<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_1.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/course-1.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_2.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/image_2.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_3.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/image_3.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_3.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/image_3.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_3.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/image_3.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="{{asset('front/images/image_3.jpg')}}"
                    class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset('front/images/image_3.jpg')}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>



@endsection