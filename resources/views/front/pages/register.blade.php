@extends('front.layouts.master')


@section('headTag')

    {!! RecaptchaV3::initJs() !!}
    @foreach ($seos as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
    {!! SEO::generate() !!}
    {!! RecaptchaV3::initJs() !!}
@endsection

@section('content')
    <section class="card text-white border-0 ">
        <img class="image-top-page" src="{{ asset('front/images/contact us.jpg') }}" alt="register to hit">
        <div class="card-img-overlay slider-image">
            <div class="card-text slider-text">
                <h1 class=" m-0 tx-green font-bold">{{ __('register to hit') }}</h1>
            </div>
        </div>
    </section>
    <nav aria-label="breadcrumb" class="py-5 container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}">{{ __('home') }}</a>
            </li>
            <li class="breadcrumb-item tx-green" aria-current="page">{{ __('register form') }}</li>
        </ol>
    </nav>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="tx-size-22">
                    {{ __('register text') }}
                </p>
            </div>
            <div class="my-5 row">

                <div class="col-md-8">

                    <form method="POST" action="{{ route('register.form.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="current_citizenship" type="text"
                                        value="{{ old('current_citizenship') }}" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Current citizenship</label>
                                </div>
                                @error('current_citizenship')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="passport_number" type="text"
                                        value="{{ old('passport_number') }}" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Passport number</label>
                                </div>
                                @error('passport_number')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="mother_name" type="text" value="{{ old('mother_name') }}"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Mother’s Full Name</label>
                                </div>
                                @error('mother_name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="degree" type="text" value="{{ old('degree') }}"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Degree</label>
                                </div>
                                @error('degree')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="major" type="text" value="{{ old('major') }}"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Major</label>
                                </div>
                                @error('major')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-floating mb-3 col-md-6">
                                <select class="form-select" name="sex" id="floatingSelect"
                                    aria-label="Floating label select example">

                                    <option value="male">
                                        Male
                                    </option>
                                    <option value="female">
                                        female
                                    </option>
                                </select>
                                <label for="floatingSelect">Sex</label>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating  border-success">
                                    <input value="{{ old('birth_day') }}" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask data-inputmask-alias="datetime" required name="birth_day"
                                        type="text" value="{{ old('mother_name') }}" class="form-control"
                                        id="floatingInput" placeholder="">
                                    <label for="floatingInput"> Date of birth </label>
                                </div>

                                @error('birth_day')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating  border-success">
                                    <input required name="address" type="text" value="{{ old('address') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Address</label>
                                </div>
                                @error('address')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating  border-success">
                                    <input required name="post_code" type="text" value="{{ old('post_code') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">post code</label>
                                </div>
                                @error('post_code')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="nationality" type="text" value="{{ old('nationality') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Nationality</label>
                                </div>
                                @error('nationality')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="email" type="email" value="{{ old('email') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">email</label>
                                </div>
                                @error('email')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3 border-success">
                                    <input required name="phone" type="text" value="{{ old('phone') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">phone</label>
                                </div>
                                @error('phone')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3 border-success">
                                    <input name="agent_email" type="email" value="{{ old('agent_email') }}"
                                        class="form-control" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Agent e-mail address </label>
                                </div>
                                @error('agent_email')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-5 col-md-6 mt-3">
                                <select class="form-select" name="course_id" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">
                                            {{ $program->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">program</label>

                                @error('program_id')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-md-6">
                                <div class="">
                                    <label for="formFile" class="form-label">passport ( png , jpg )</label>
                                    <input required class="form-control" name="passport" type="file" id="formFile">
                                </div>
                                @error('passport')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">

                            {!! RecaptchaV3::field('register-form') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>

                                </span>
                            @endif

                        </div>

                        <div class=" mt-3">
                            <button class="btn btn-outline-success py-3" type="submit">SEND</button>
                        </div>
                    </form>
                </div>


                <div class="col-md-4 ">

                    <div class="bg-purple p-5 text-white">

                        <h5 class="font-bold"> Contact Info</h5>

                        <p class="tx-green">{{ $contact->address }}</p>

                        <p>
                            <span> <i class="fa fa-envelope"></i></span>
                            <span> <a class="text-white px-3"
                                    href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                        </p>

                        <p class="">
                            <span> <i class="fa fa-phone"></i></span>
                            <span> <a class="text-white px-3"
                                    href="tel:{{ $contact->phone_one }}">{{ $contact->phone_one }}</a></span>
                            <span> <a class="text-white"
                                    href="tel:{{ $contact->phone_two }}">{{ $contact->phone_two }}</a></span>
                        </p>

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
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('admin/sweetalert/sweetalert2.all.min.js') }}"></script>
    @include('admin.layouts.sweet_alert_success')

    <script src="{{ asset('front/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('front/plugins/inputmask/jquery.inputmask.min.js') }}"></script>


    <script>
        $(function() {
            //Money Euro
            $('[data-mask]').inputmask({
                outputFormat: "dd/mm/yyyy"
            })
        });
    </script>
    @foreach ($seos as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
@endsection
