@extends('front.layouts.master')
@section('headTag')
    <link rel="stylesheet" href="{{ asset('front/css/how-apply.css') }}">
    @foreach ($seo_courses as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img class="image-top-page" src="{{ asset('front/images/course list.jpg') }}" alt="">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ __('course list') }}</h1>
            </div>
        </div>
    </section>

    <section class="container">
        <nav aria-label="breadcrumb" class="mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
                </li>
                <li class="breadcrumb-item tx-green" aria-current="page">{{ __('course list') }}</li>
            </ol>
        </nav>
        <div class="d-flex row mb-4">

            <div class="col-md-8 ">
                @foreach ($courses as $course)
                    <div class=" mt-5 bg-gray pb-4">
                        <div class="flex-md-row-reverse row flex">

                            <div class="col-md-4 col-12  d-flex align-items-center ">
                                <a
                                    href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}">
                                    <img class="courses-img p-md-2" src="{{ asset($course->img) }}"
                                        alt="{{ $course->title }}">
                                </a>
                            </div>
                            <div class="col-md-8 col-12">
                                <h3 class="font-bold p-5">{{ $course->title }}</h3>
                                <p class="px-5 py-1">
                                    <span class="font-bold">Duration :</span>
                                    <span>{{ $course->duration }}</span>
                                </p>
                                <p class="px-5 py-1">
                                    <span class="font-bold">Credit :</span>
                                    <span>{{ $course->credit }}</span>
                                </p>
                                <p class="px-5 py-1">
                                    <span class="font-bold">Start :</span>
                                    <span>{{ $course->start_course_day . ' ' . $course->start_course_month }}</span>
                                </p>
                                <p class="px-5 py-1">
                                    <span class="font-bold">Language :</span>
                                    <span class=""> {{ $course->course_lang == 'hu' ? 'Hungary' : 'English' }}
                                    </span>
                                </p>
                                <p class="px-5 py-1">
                                    <a class="btn btn-success"
                                        href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}">
                                        More Detail
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



            <div class="col-md-4 mt-5">

                <div class="bg-purple p-5 text-white">

                    <h5 class="font-bold"> Contact Info</h5>

                    <p class="tx-green">{{ $contact->address }}</p>

                    <h5 class="font-bold">Social Info</h5>

                    <p class="pt-3 text-center">
                        <a href="{{ $contact->instagram }}" class="pe-3">
                            <i class="fa-brands fa-instagram tx-size-35 tx-green"></i>
                        </a>
                        <a href="{{ $contact->telegram }}" class="pe-3">
                            <i class="fa-brands fa-telegram tx-size-35 tx-green"></i>
                        </a>
                        <a href="{{ $contact->twitter }}" class="pe-3">
                            <i class="fa-brands fa-twitter tx-size-35 tx-green"></i>
                        </a>
                        <a href="{{ $contact->youtube }}" class="pe-3">
                            <i class="fa-brands fa-youtube tx-size-35 tx-green"></i>
                        </a>
                    </p>
                </div>

            </div>

        </div>
    </section>
@endsection


@section('script')
    @foreach ($seo_courses as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
