@extends('admin.layouts.master')

@section('title')
    <title>Edit About</title>
    <link rel="stylesheet" href="{{ asset('front/css/pages/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> Back </a>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('about-us.index') }}">About</a></li>
                        <li class="breadcrumb-item active">Edit About</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admission.update', $admission->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class=" p-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="my-5 container">

                                    <h2 class="pb-4 font-bold">Detail About How To Apply</h2>

                                    <div class="row d-flex tx-size-18">

                                        <div class="col-sm-6 ">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_one" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_one', $admission->text_one) }}</textarea>
                                                <label for="floatingTextarea1">text </label>
                                                <br>
                                                @error('text_one')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_two" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_two', $admission->text_two) }}</textarea>
                                                <label for="floatingTextarea1">text </label>
                                                <br>
                                                @error('text_two')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <section class="pt-5 my-5">
                                    <div class="container">

                                        <h3 class="font-bold">The Application Process</h3>

                                        <div class="d-flex row g-0">
                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">1</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_one"
                                                            value="{{ old('pr_title_one', $admission->pr_title_one) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_one')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_one" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                            style="height: 100px">{{ old('pr_text_one', $admission->pr_text_one) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_one')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">2</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_two"
                                                            value="{{ old('pr_title_two', $admission->pr_title_two) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_two')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_two" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                            style="height: 100px">{{ old('pr_text_two', $admission->pr_text_two) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_two')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">3</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_three"
                                                            value="{{ old('pr_title_three', $admission->pr_title_three) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_three')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_three" required placeholder="Leave a comment here"
                                                            id="floatingTextarea1" style="height: 100px">{{ old('pr_text_three', $admission->pr_text_three) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_three')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">4</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_four"
                                                            value="{{ old('pr_title_four', $admission->pr_title_four) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_four')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_four" required placeholder="Leave a comment here"
                                                            id="floatingTextarea1" style="height: 100px">{{ old('pr_text_four', $admission->pr_text_four) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_four')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">5</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_five"
                                                            value="{{ old('pr_title_five', $admission->pr_title_five) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_five')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_five" required placeholder="Leave a comment here"
                                                            id="floatingTextarea1" style="height: 100px">{{ old('pr_text_five', $admission->pr_text_five) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_five')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 pt-5">
                                                <span class="tx-size-35 tx-green font-bold">6</span>
                                                <span class="-bold ps-3 ">
                                                    <div class="form-floating">
                                                        <input required dir="rtl" name="pr_title_six"
                                                            value="{{ old('pr_title_six', $admission->pr_title_six) }}"
                                                            type="text" class="form-control" id="floatingInput"
                                                            placeholder="duration">
                                                        <label for="floatingInput">title </label>
                                                        <br>
                                                        @error('pr_title_six')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </span>
                                                <div class="pt-3 pe-5">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="pr_text_six" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                            style="height: 100px">{{ old('pr_text_six', $admission->pr_text_six) }}</textarea>
                                                        <label for="floatingTextarea1">text </label>
                                                        <br>
                                                        @error('pr_text_six')
                                                            <span class="alert_required bg-danger text-white p-1 rounded"
                                                                role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class=" mt-5 divider-green">
                                        <!-- Things First -->

                                        <div class="d-flex row py-5">
                                            <div class="col-md-6">
                                                <h5 class="font-bold">Things To Know First</h5>

                                                <div class="form-floating">
                                                    <textarea class="form-control" name="need_one" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                        style="height: 100px">{{ old('need_one', $admission->need_one) }}</textarea>
                                                    <label for="floatingTextarea1">text </label>
                                                    <br>
                                                    @error('need_one')
                                                        <span class="alert_required bg-danger text-white p-1 rounded"
                                                            role="alert">
                                                            <strong>
                                                                {{ $message }}
                                                            </strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <p class="py-3">You will need :</p>

                                                <ul>
                                                    <li class="pt-3 list-style">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="need_two" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('need_two', $admission->need_two) }}</textarea>
                                                            <label for="floatingTextarea1">text </label>
                                                            <br>
                                                            @error('need_two')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="pt-3 list-style">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="need_three" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('need_three', $admission->need_three) }}</textarea>
                                                            <label for="floatingTextarea1">text </label>
                                                            <br>
                                                            @error('need_three')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="pt-3 list-style">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="need_four" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('need_four', $admission->need_four) }}</textarea>
                                                            <label for="floatingTextarea1">text </label>
                                                            <br>
                                                            @error('need_four')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="font-bold">Any Question</h5>

                                                <div class="form-floating mt-5 ">
                                                    <select dir="rtl" class="form-select" name="lang"
                                                        id="floatingSelect" aria-label="Floating label select example">
                                                        @foreach ($langs as $lang)
                                                            <option @selected($lang === $admission->lang)
                                                                value="{{ $lang }}">
                                                                {{ $lang }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <label for="floatingSelect">Language</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="row">
                                    <h1 class="my-5">for seo</h1>
                                    <div class="form-floating mb-3 c col-md-6">
                                        <input dir="rtl" onkeyup="counterTitle(this)"
                                            value="{{ old('title', $admission->title) }}" name="title" type="text"
                                            required class="form-control" id="floatingInput" placeholder="title">
                                        <label for="floatingInput">Title</label>
                                        <span id="counterTitle" class="right badge badge-danger p-2"></span>
                                        <br>
                                        @error('title')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 c col-md-6">
                                        <textarea dir="rtl" style="height: 150px" onkeyup="counterBody(this)" name="description" type="text"
                                            required class="form-control" id="floatingInput" placeholder="description">{{ old('description', $admission->description) }}</textarea>
                                        <label for="floatingInput">description</label>
                                        <span id="counterBody" class="right badge badge-danger p-2"></span>
                                        <br>

                                        @error('description')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                @foreach ($admission->seos as $seo)
                                    <section class="row p-3">
                                        <div class="form-floating  col-md-4">
                                            <textarea style="height: 200px" name="old_script[{{ $seo->id }}]" type="text" required class="form-control"
                                                id="floatingInput" placeholder="script"> {{ $seo->script }}</textarea>
                                            <label for="floatingInput">script</label>
                                            <br>
                                        </div>
                                        <div class="form-floating  col-md-4">
                                            <select class="form-select" name="old_location[]" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option @selected($seo->location === 'header') value="header">
                                                    Header
                                                </option>

                                                <option @selected($seo->location === 'script') value="script">
                                                    script
                                                </option>
                                            </select>
                                            <label for="floatingSelect">Location</label>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="{{ route('delete-single-page', $seo->id) }}"
                                                class="btn btn-outline-danger delete ">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>

                                    </section>
                                @endforeach

                                <section class="row p-3">
                                    <div class="form-floating mb-3 c col-md-4">
                                        <textarea name="script[]" type="text" class="form-control" id="floatingInput" placeholder="script"></textarea>
                                        <label for="floatingInput">script</label>
                                        <br>
                                    </div>
                                    <div class="form-floating mb-5 col-md-4">
                                        <select class="form-select" name="location[]" id="floatingSelect"
                                            aria-label="Floating label select example">

                                            <option value="header">
                                                Header
                                            </option>
                                            <option value="script">
                                                script
                                            </option>
                                        </select>
                                        <label for="floatingSelect">Location</label>
                                    </div>
                                </section>
                                <section>
                                    <a class="btn btn-danger m-5" id="copy">Add</a>
                                </section>
                            </div>
                            <button class="btn btn-success p-3 m-3" type="submit">save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('admin/js/count.js') }}"></script>
    <script src="{{ asset('admin/js/copy.js') }}"></script>
@endsection
