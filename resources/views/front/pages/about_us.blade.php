@extends('front.layouts.master')

@section('headTag')
    <link rel="stylesheet" href="{{ asset('front/css/pages/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
    {!! SEO::generate() !!}
    @foreach ($seos as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img class="image-top-page" src="{{ asset('front/images/contact us.jpg') }}" alt="">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ __('About us') }}</h1>
            </div>
        </div>
    </section>

    <nav aria-label="breadcrumb" class="py-5 container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
            </li>
            <li class="breadcrumb-item tx-green" aria-current="page">{{ __('About us') }}</li>
        </ol>
    </nav>


    <section class="container pb-5">
        <div class="row">
            <div class="col-md-4 p-about">
                <h2>{{ $about->title_one }}</h2>
                <hr class="divider-green">
            </div>
            <div class="col-md-4">
                <p>{!! $about->text_one !!}
                </p>
            </div>
            <div class="col-md-4">
                <p> {!! $about->text_two !!}

                </p>
            </div>

        </div>
    </section>
    <section>
        <div class="card border-0">
            <img class="img-about-us" loading="lazy" src="{{ asset('front/images/2.png') }}"
                alt="Hungary Institute of Innovation and Technology">

            <div class="card-img-overlay card-about  ">
                <div class="container pt-5">
                    <div class=" row">
                        <div class="col-md-4">
                            <img src="{{ asset('front/images/about-us/col-icon-2.png') }}" alt="university in hungary">
                            <h5 class="tx-green py-4">{{ $about->title_two }}</h5>
                            <p class="text-white tx-size-18">
                                {!! $about->text_three !!}
                            </p>
                        </div>

                        <div class="col-md-4">
                            <img src="{{ asset('front/images/about-us/col-icon-3.png') }}" alt="hit college">
                            <h5 class="tx-green py-4">{{ $about->title_three }}</h5>

                            <p class="text-white tx-size-18">
                                {!! $about->text_four !!}
                            </p>

                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('front/images/about-us/col-icon-4.png') }}" alt="hit institute">
                            <h5 class="tx-green py-4">{{ $about->title_four }}</h5>
                            <p class="text-white tx-size-18">
                                {!! $about->text_five !!}
                            </p>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <section class="overflow-hidden">
        <div class="row">
            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <img src="{{ asset('front/images/about-us/about-icon-1.png') }}" alt="study in hungary">
                <h3 class="py-4 font-bold">{{ $about->title_five }}</h3>

                <p class="tx-size-18">
                    {!! $about->text_six !!}
                </p>
            </div>
            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card" src="{{ asset($about->img_one) }}" alt="it college in hungary">
            </div>

            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card " src="{{ asset($about->img_two) }}" alt="university in hungary">
            </div>

            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <img src="{{ asset('front/images/about-us/about-icon-1.png') }}" alt="hit">
                <h3 class="py-4 font-bold">{{ $about->title_six }}</h3>
                <p class="tx-size-18">
                    {!! $about->text_seven !!}
                </p>
            </div>

            <div class="col-lg-6 mt-5 pt-5 px-5  ">
                <img src="{{ asset('front/images/about-us/about-icon-1.png') }}" alt="hungary institute">
                <h3 class="py-4 font-bold">{{ $about->title_seven }}</h3>

                <p class="tx-size-18">
                    {!! $about->text_eight !!}
                </p>
            </div>
            <div class="d-none col-lg-6 d-lg-block p-0">
                <img class="img-about-us-card" src="{{ asset($about->img_three) }}" alt="hit institute">
            </div>

        </div>

        <div class="container py-5 my-5">
            <div class="owl-carousel owl-theme">

                @foreach ($partners as $partner)
                    <a rel="nofollow" href="{{ $partner->url }}">
                        <img src="{{ asset($partner->img) }}" alt="hit partner">
                    </a>
                @endforeach

            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="{{ asset('front/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                items: 6,
                loop: true,
                lazyLoad: true,
                margin: 10,
                center: true,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true

            });
        });
    </script>

    @foreach ($seos as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
