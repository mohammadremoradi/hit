@extends('front.layouts.master')
@section('headTag')
    {!! SEO::generate() !!}
    <link rel="stylesheet" href="{{ asset('front/css/how-apply.css') }}">
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img loading="lazy" class="image-top-page" src="{{ asset($course->img) }}" alt="hit {{ $course->title }}">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ $course->title }}</h1>
            </div>
        </div>
    </section>

    <section class="container">
        <nav aria-label="breadcrumb" class="mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
                </li>
                <li class="breadcrumb-item tx-green" aria-current="page">{{ $course->title }}</li>
            </ol>
        </nav>
        <div class="d-flex row mb-4">



            <div class="d-flex row mb-4 pb-5">
                <div class="col-md-8 ">
                    <img loading="lazy" src="{{ asset($course->img) }}" width="100%" alt="{{ $course->title }}">
                    <p class="pt-5">
                        {!! $course->body !!}
                    </p>
                </div>
                
                <div class="col-md-4">
                    <div class="bg-gray p-5  ">
                        <div class=" card">

                            <img loading="lazy" src="{{ asset($course->img) }}" class="card-img card_img_course"
                                alt="{{ 'hit' . $course->title . ' ' . 'video' }}">
                            <div class="card-img-overlay text-center  pt-5">
                                <button type="button" class="btn-play " data-bs-toggle="modal" data-src=""
                                    data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                        <div class="modal modal-video fade" id="videoModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- 16:9 aspect ratio -->
                                        <div class="ratio ratio-16x9">
                                            <video  id="my-video" controls>
                                                <source src="{{ asset($course->video) }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5">

                            <p>
                                <span class="font-bold"> Duration: </span>
                                <span class="float-end"> {{ $course->duration }} </span>
                            </p>

                            <p>
                                <span class="font-bold"> Credit : </span>
                                <span class="float-end"> {{ $course->credit }} </span>
                            </p>
                            <p>
                                <span class="font-bold"> Start : </span>
                                <span class="float-end">
                                    {{ $course->start_course_day . ' ' . $course->start_course_month }} </span>
                            </p>
                            <p>
                                <span class="font-bold"> Language : </span>
                                <span class="float-end"> {{ $course->course_lang == "hu" ? "Hungary" : "English" }} </span>
                            </p>
                            <p class="d-grid pt-4">
                                <a href="{{ $course->lang == 'hu' ? route('register.hu') : route('register.en') }}" class="btn btn-outline-success py-3 "> Enroll Course </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

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
@endsection
