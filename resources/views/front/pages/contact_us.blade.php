@extends('front.layouts.master')


@section('headTag')
<link rel="stylesheet" href="{{ asset('front/css/pages/about-us.css') }}">
    @foreach ($contacts as $seo)
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
                <h1 class=" m-0 tx-green font-bold">{{ __('contact us') }}</h1>
            </div>
        </div>
    </section>
    <nav aria-label="breadcrumb" class="py-5 container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
            </li>
            <li class="breadcrumb-item tx-green" aria-current="page">{{ __('contact us') }}</li>
        </ol>
    </nav>


    <section class="container">
        <div class="d-flex row pb-5 g-5">
            <div class="col-md-8">
                <h1 class=" font-bold text-uppercase "> {{ __('leave us your info') }}</h1>
                <p class="tx-size-20 p-4">
                    {{ __('contact us text') }}
                </p>
                <form method="POST" action="{{ route('question.form.submit') }}">
                    @csrf
                    <div class="form-floating mb-3 border-success">
                        <input required name="fullname" type="text" value="{{ old('fullname') }}" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Fullname</label>
                    </div>
                    @error('fullname')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    <div class="form-floating mb-3">
                        <input required name="email" value="{{ old('email') }}" type="email" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    @error('email')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    <div class="form-floating mb-3">
                        <input required value="{{ old('subject') }}" name="subject" type="text" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Subject</label>
                    </div>
                    @error('subject')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    <div class="form-floating">
                        <textarea class="form-control mb-2" name="message" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px">{{ old('message') }}</textarea>
                        <label for="floatingTextarea2">Message</label>
                        @error('message')
                            <span class="alert_required bg-danger mt-3 text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-outline-success py-3" type="submit">SEND</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h2 class="font-bold text-uppercase ">{{ __('location') }} </h2>
                <p class="py-4 pe-4">{{ $contact_us->address }}
                </p>
                <p>
                    <span> <i class="fa fa-envelope"></i></span>
                    <span> <a class="text-dark px-3"
                            href="mailto:{{ $contact_us->email }}">{{ $contact_us->email }}</a></span>
                </p>
                <p class="mb-5">
                    <span> <i class="fa fa-phone"></i></span>
                    <span> <a class="text-dark px-3"
                            href="tel:{{ $contact_us->phone_one }}">{{ $contact_us->phone_one }}</a></span>
                    <span> <a class="text-dark px-3"
                            href="tel:{{ $contact_us->phone_two }}">{{ $contact_us->phone_two }}</a></span>
                </p>
                <div>
                    {!! $contact_us->iframe !!}
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray">
        <div class=" py-5 text-center">
            <a href="{{ $contact_us->instagram }}"> <i class=" tx-green fa-brands fa-instagram px-5 tx-size-28"></i></a>
            <a href="{{ $contact_us->telegram }}"> <i class=" tx-green fa-brands fa-telegram px-5 tx-size-28"></i></a>
            <a href="{{ $contact_us->twitter }}"> <i class=" tx-green fa-brands fa-twitter px-5 tx-size-28"></i></a>
            <a href="{{ $contact_us->youtube }}"> <i class=" tx-green fa-brands fa-youtube px-5 tx-size-28"></i></a>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('admin/sweetalert/sweetalert2.all.min.js') }}"></script>
    @include('admin.layouts.sweet_alert_success')

    @foreach ($contacts as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
