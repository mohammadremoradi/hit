@extends('front.layouts.master')


@section('headTag')
    {!! SEO::generate() !!}
    <link rel="stylesheet" href="{{ asset('front/css/pages/landing.css') }}">
    @foreach ($seos as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection

@section('content')
    <!-- Slider Section Start -->
    <section class="container-slider">
        <img src="{{ asset($landing->slider_image) }}" alt="Hungary Institute of Innovation and Technology"
            style="width:100%; height: 40rem;">
        <div class="text-slider px-2 ">
            <h1 class="anim animate__animated  animate__fast animate__backInLeft
        ">{{ $landing->slider_text_one }}
            </h1>
            <a href="{{ app()->getLocale() == 'hu' ? route('courses.hu') : route('courses.en') }}"
                class="btn btn-lg  text-left text-white btn-success mt-5 ">{{ __('Why HIT') }}</a>
        </div>
    </section>
    <!-- Slider Section End -->

    <section class="row d-flex g-0">
        <div class="col-md-3 col-sm-6 card border-0 text-white">
            <img loading="lazy" class="four-height" src="{{ asset('front/images/Future-proof.jpg') }}" alt="Future proof">
            <div class="card-img-overlay text-center font-bold card-my">
                <p class="card-body ">
                    <img loading="lazy" src="{{ asset('front/images/cards/card-svg.png') }}" class="mt-5 card-text"
                        alt="hungary university">
                <p class="card-text  font-bold">{{ __('Future proof') }}</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 card border-0 text-white">
            <img class="four-height" loading="lazy" src="{{ asset('front/images/Job-oriented.jpg') }}" alt="Job oriented">
            <div class="card-img-overlay text-center font-bold card-my">
                <p class="card-body ">
                    <img loading="lazy" src="{{ asset('front/images/cards/card-svg.png') }}" class="mt-5 card-text"
                        alt="">
                <p class="card-text  font-bold">{{ __('Job oriented') }}</p>
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 card border-0 text-white">
            <img class="four-height" loading="lazy" src="{{ asset('front/images/Student-friendly.jpg') }}"
                alt="Student friendly">
            <div class="card-img-overlay text-center font-bold card-my">
                <p class="card-body ">
                    <img loading="lazy" src="{{ asset('front/images/cards/card-svg.png') }}" class="mt-5 card-text"
                        alt="Student friendly">
                <p class="card-text  font-bold">{{ __('Student friendly') }}</p>
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 card border-0 text-white ">
            <img loading="lazy" class="four-height" src="{{ asset('front/images/Practical.jpg') }}" alt="Practical">
            <div class="card-img-overlay text-center font-bold card-my">
                <p class="card-body ">
                    <img loading="lazy" src="{{ asset('front/images/cards/card-svg.png') }}" class="mt-5 card-text"
                        alt="Practical">
                <p class="card-text  font-bold">{{ __('Practical') }}</p>
                </p>

            </div>
        </div>

    </section>

    <!-- slider section end -->

    <!-- about us section  -->
    <section class="bg-purple">
        <section class="container">
            <div class="d-flex row pt-5">
                <div class="col-md-4 pt-5">
                    <img loading="lazy" src="{{ asset($logo_color) }}" width="100%" alt="logo hit institute">
                    <h2 class="tx-gray fw-bolder tx-green pt-4">{{ __('About HIT') }}</h2>
                </div>

                <div class="col-md-8 pt-2 pt-md-5 ">
                    <div class="tx-blue tx-size-22">
                        {!! $landing->about_us_text !!}
                    </div>
                    <a class=" tx-size-20 pt-3 a-hover-green"
                        href="{{ app()->getLocale() == 'hu' ? route('about.hu') : route('about.en') }}">read more <i
                            class="fa fa-long-arrow-right"></i></a>
                </div>

            </div>
            <div>
                <img loading="lazy" src="{{ asset('front/images/1.png') }}" width="100%" class="about-img"
                    alt="about hit institute ">
            </div>
        </section>
    </section>

    <!-- about us section end -->

    <!-- about us video -->
    <div class="card  border-0">
        <img class="img-about-us" loading="lazy" src="{{ asset('front/images/2.png') }}"
            alt="Hungary Institute of Innovation and Technology">

        <div class="card-img-overlay pad_vid ">
            <div class="pad-video">
                <p class="card-text font-bold">
                <div class="text-center  text-white ">
                    <button type="button" class="btn-play" data-bs-toggle="modal" data-src=""
                        data-bs-target="#videoModal">
                        <span></span>
                    </button>
                    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    {{-- <h3 class="modal-title" id="exampleModalLabel"> Video</h3> --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <!-- 16:9 aspect ratio -->
                                    <div class="ratio ratio-16x9">
                                        <video id="my-video" controls>
                                            <source src="{{ asset($landing->about_us_video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold py-4">video tour in Hungary </h3>

                    <p class="tx-size-20  ">{{ __('video tour') }}</p>
                </div>
                </p>
            </div>
        </div>
    </div>


    <!-- about us video end -->


    <!-- Apply for Admission section -->


    <section class="d-flex row col-12 g-0">

        <img loading="lazy" class="col-md-6 d-none d-md-block "
            src="{{ asset('front/images/apply-for-addmission.jpg') }}" width="100%" alt="">

        <div class="col-md-6 col-sm-12 card border-0  ">
            <img class="img-admission" src="{{ asset('front/images/apply-for-addmission-2.jpg') }}"
                alt="apply for Hungary Institute of Innovation and Technology">
            <div class="card-img-overlay admission-text  ">
                <p class="card-body ">
                <p class="card-text  pl-3">
                <p class="font-bold text-white tx-size-28 ">Apply for Admission</p>
                <p class="py-2 tx-green tx-size-20">Fall 2019 applications are now open</p>
                <p class="text-white tx-size-18">We don’t just give students an education and experiences
                    <br>
                    that set them up for success in a career. We
                    help them <br>
                    succeed in their career—to discover a field they’re passionate about and dare to lead it.
                </p>

                <a href="{{ app()->getLocale() == 'hu' ? route('admissions.hu') : route('admissions.en') }}"
                    class="btn btn-success font-bold p-3"> Apply Now </a>
                </p>

                </p>


            </div>
        </div>

    </section>
    <!-- Apply for Admission section end-->

    <!-- course start -->

    <section class="container mt-5 py-5">
        <div class="d-flex ">
            <h2 class="font-bold col-4">{{ __('news and update') }}</h2>
            <hr class="courses-header  col-8">
        </div>
        <div class="mt-5 d-flex row  ">
            @foreach ($courses as $course)
                <div class="card col-md-4 border-0">

                    <a class=""
                        href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}">
                        <img class=" card-img-top" src="{{ asset($course->img) }}" class="card-img-top"
                            alt="{{ $course->title }}">
                    </a>
                    <div class="card-body">
                        <p class="card-text row d-flex g-0">
                            <span class="col-lg-2 col-md-3 col-sm-1 col-2 font-bold">
                                <span class="tx-green tx-size-35">{{ $course->start_course_day }}</span> <br>
                                {{ $course->start_course_month }}
                            </span>

                            <span class="col-lg-10 col-md-9 col-sm-10 col-10 pt-2 ">
                                <span class="font-bold tx-size-20">
                                    <a href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}"
                                        class="text-black">
                                        {{ $course->title }}
                                    </a>
                                </span>
                                <br class="clearfix">
                                <p class="">
                                    {!! $course->summary !!}
                                </p>
                            </span>
                        </p>
                        <p class="card-text bg-transparent border-0">
                            <a href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}"
                                class="btn btn-success ">READ MORE</a>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection



@section('script')
    <script>
        $('#videoModal').on('hidden.bs.modal', function(e) {
            var vid = document.getElementById("my-video");
            vid.pause();
        })
    </script>

    @foreach ($seos as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
