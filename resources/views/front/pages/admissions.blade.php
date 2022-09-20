@extends('front.layouts.master')

@section('headTag')
    <link rel="stylesheet" href="{{ asset('front/css/pages/admissions.css') }}">
    {!! SEO::generate() !!}
    @foreach ($seos as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img class="image-top-page" src="{{ asset('front/images/contact us.jpg') }}" alt="hit admissions">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ __('admissions') }}</h1>
            </div>
        </div>
    </section>

    <nav aria-label="breadcrumb" class="py-5 container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
            </li>
            <li class="breadcrumb-item tx-green" aria-current="page">{{ __('admissions') }}</li>
        </ol>
    </nav>

    <div class="my-5 container">

        <h2 class="pb-4 font-bold">{{ __('detail apply') }}</h2>

        <div class="row d-flex tx-size-18">

            <div class="col-sm-6 ">
                <p>
                    {{ $admission->text_one }}

                </p>
            </div>
            <div class="col-sm-6">
                {{ $admission->text_two }}

            </div>
        </div>
    </div>


    {{-- <section class="bg-purple">
        <div class="container">
            <div class="row d-flex py-5">

                <div class="col-md-3 text-white py-5">
                    <img src="{{ asset('front/images/how-apply/col-icon-1.png') }}" alt="education">
                    <h3 class="font-bold tx-size-22 py-4">Education Services</h3>
                    <p class="tx-size-18">
                        Kingster University was established by John Smith in 1920 for the public benefit and it is
                        recognized.

                    </p>
                </div>

                <div class="col-md-3 text-white py-5">
                    <img src="{{ asset('front/images/how-apply/col-icon-2.png') }}" alt="International Hubs">
                    <h3 class="font-bold tx-size-22 py-4">International Hubs</h3>
                    <p class="tx-size-18">
                        Kingster University was established by John Smith in 1920 for the public benefit and it is
                        recognized.

                    </p>
                </div>
                <div class="col-md-3 text-white py-5">
                    <img src="{{ asset('front/images/how-apply/col-icon-3.png') }}" alt="it lab">
                    <h3 class="font-bold tx-size-22 py-4">Bachelor’s and Master’s</h3>
                    <p class="tx-size-18">
                        Kingster University was established by John Smith in 1920 for the public benefit and it is
                        recognized.

                    </p>
                </div>
                <div class="col-md-3 text-white py-5">
                    <img src="{{ asset('front/images/how-apply/col-icon-4.png') }}" alt="hit college">
                    <h3 class="font-bold tx-size-22 py-4">University Life</h3>
                    <p class="tx-size-18">
                        Kingster University was established by John Smith in 1920 for the public benefit and it is
                        recognized.

                    </p>
                </div>
            </div>
        </div>

    </section> --}}

    <div class="admission-img"></div>


    <section class="pt-5 my-5">
        <div class="container">
            <h3 class="font-bold">{{ __('application process') }}</h3>
            <div class="d-flex row g-0">
                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">1</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_one }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_one }}
                    </p>
                </div>
                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">2</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_two }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_two }}
                    </p>
                </div>

                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">3</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_three }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_three }}
                    </p>
                </div>

                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">4</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_four }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_four }}
                    </p>
                </div>
                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">5</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_five }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_five }}
                    </p>
                </div>

                <div class="col-md-4 pt-5">
                    <span class="tx-size-35 tx-green font-bold">6</span>
                    <span class="font-bold ps-3 tx-size-20">{{ $admission->pr_title_six }}</span>
                    <p class="pt-3 pe-5">
                        {{ $admission->pr_text_six }}

                    </p>
                </div>
            </div>
            <hr class=" mt-5 divider-green">
            <!-- Things First -->

            <div class="d-flex row py-5">
                <div class="col-md-6">
                    <h5 class="font-bold">Things To Know First</h5>
                    <p>
                        {{ $admission->need_one }}
                    </p>
                    <p class="py-3">You will need :</p>

                    <ul>
                        <li class="pt-3 list-style">
                            {{ $admission->need_two }}

                        </li>
                        <li class="pt-3 list-style">
                            {{ $admission->need_three }}

                        </li>
                        <li class="pt-3 list-style">
                            {{ $admission->need_four }}

                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="font-bold">Any Question</h5>

                    <form method="POST" action="{{ route('question.form.submit') }}">
                        @csrf
                        <div class="form-floating mb-3 border-success">
                            <input required name="fullname" type="text" value="{{ old('fullname') }}"
                                class="form-control" id="floatingInput" placeholder="name@example.com">
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
                            <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px">{{ old('message') }}</textarea>
                            <label for="floatingTextarea2">Message</label>
                            @error('message')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
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
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('admin/sweetalert/sweetalert2.all.min.js') }}"></script>
    @include('admin.layouts.sweet_alert_success')
    @foreach ($seos as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
