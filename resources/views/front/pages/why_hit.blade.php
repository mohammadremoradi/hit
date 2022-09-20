@extends('front.layouts.master')

@section('headTag')
    <link rel="stylesheet" href="{{ asset('front/css/pages/about-us.css') }}">
    {!! SEO::generate() !!}
    @foreach ($seos as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img class="image-top-page" src="{{ asset('front/images/contact us.jpg') }}" alt="why hit">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ __('why hit') }}</h1>
            </div>
        </div>
    </section>

    <nav aria-label="breadcrumb" class="py-5 container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
            </li>
            <li class="breadcrumb-item tx-green" aria-current="page">{{ __('why hit') }}</li>
        </ol>
    </nav>


    <section class="container pb-5">
        <div class="row">
            <div class="col-md-2 ">
                <h2>{{ __('why hit') }}</h2>
                <hr class="divider-green">
            </div>
            <div class="col-md-5">
                <p class="tx-size-20"> {{ __('why text one') }}
                </p>
            </div>
            <div class="col-md-5">
                <p class="tx-size-20"> {{ __('why text two') }}
                </p>
            </div>

        </div>
    </section>

    <section class="overflow-hidden">
        <div class="row">
            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <h3 class="py-4 font-bold">{{ __('why reason title one') }}</h3>

                <p class="tx-size-18">

                    {{ __('why reason text one') }}
                </p>
            </div>
            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card" src="{{ asset('front/images/about-us/1.jpg') }}"
                    alt="it college in hungary">
            </div>


            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card " src="{{ asset('front/images/about-us/3.jpg') }}"
                    alt="university in hungary">
            </div>

            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <h3 class="py-4 font-bold">{{ __('why reason title two') }}</h3>
                <p class="tx-size-18">
                    {{ __('why reason text two') }}
                </p>
            </div>

            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <h3 class="py-4 font-bold">{{ __('why reason title three') }}</h3>

                <p class="tx-size-18">
                    {{ __('why reason text three') }}
                </p>
            </div>
            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card" src="{{ asset('front/images/about-us/1.jpg') }}" alt="hit institute">
            </div>

            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card " src="{{ asset('front/images/about-us/3.jpg') }}"
                    alt="university in hungary">
            </div>
            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <h3 class="py-4 font-bold">{{ __('why reason title four') }}</h3>
                <p class="tx-size-18">
                    {{ __('why reason text four') }}
                </p>
            </div>

            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <h3 class="py-4 font-bold">{{ __('why reason title five') }}</h3>

                <p class="tx-size-18">
                    {{ __('why reason text five') }}
                </p>
            </div>
            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card" src="{{ asset('front/images/about-us/1.jpg') }}" alt="hit institute">
            </div>
        </div>
    </section>
@endsection


@section('script')
    @foreach ($seos as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
