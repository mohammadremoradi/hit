@extends('admin.layouts.master')

@section('title')
    <title>Create About us</title>
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
                        <li class="breadcrumb-item"><a href="{{ route('about-us.index') }}">About us</a></li>
                        <li class="breadcrumb-item active">Create about us</li>
                    </ol>
                </div>
            </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="p-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <section class="container pb-5">
                                    <div class="row">
                                        <div class="col-md-4 p-about">
                                            <div class="form-floating">
                                                <input required dir="rtl" name="title_one"
                                                    value="{{ old('title_one') }}" type="text" class="form-control"
                                                    id="floatingInput" placeholder="duration">
                                                <label for="floatingInput">title </label>
                                                <br>
                                                @error('title_one')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <hr class="divider-green">
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_one" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_one') }}</textarea>
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
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_two" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_two') }}</textarea>
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
                                </section>

                                <section>
                                    <div class="card border-0">
                                        <img class="img-about-us" loading="lazy" src="{{ asset('front/images/2.png') }}"
                                            alt="Hungary Institute of Innovation and Technology">
                                        <div class="card-img-overlay card-about  ">
                                            <div class="container pt-5">
                                                <div class=" row">
                                                    <div class="col-md-4">
                                                        <img class=""
                                                            src="{{ asset('front/images/about-us/col-icon-2.png') }}"
                                                            alt="">
                                                        <div class="form-floating my-5 ">
                                                            <input required dir="rtl" name="title_two"
                                                                value="{{ old('title_two') }}" type="text"
                                                                class="form-control" id="floatingInput2" placeholder="">
                                                            <label for="floatingInput2">title </label>
                                                            @error('title_two')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="text_three" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('text_three') }}</textarea>
                                                            <label for="floatingTextarea1">text</label>
                                                            <br>
                                                            @error('text_three')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <div class="col-md-4">
                                                        <img class=""
                                                            src="{{ asset('front/images/about-us/col-icon-2.png') }}"
                                                            alt="">
                                                        <div class="form-floating my-5 ">
                                                            <input required dir="rtl" name="title_three"
                                                                value="{{ old('title_three') }}" type="text"
                                                                class="form-control" id="floatingInput2" placeholder="">
                                                            <label for="floatingInput2">title</label>
                                                            @error('title_three')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="text_four" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('text_four') }}</textarea>
                                                            <label for="floatingTextarea1">text</label>
                                                            <br>
                                                            @error('text_four')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <img class=""
                                                            src="{{ asset('front/images/about-us/col-icon-2.png') }}"
                                                            alt="">
                                                        <div class="form-floating my-5 ">
                                                            <input required dir="rtl" name="title_four"
                                                                value="{{ old('title_four') }}" type="text"
                                                                class="form-control" id="floatingInput2" placeholder="">
                                                            <label for="floatingInput2">title</label>
                                                            @error('title_four')
                                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                                    role="alert">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="text_five" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                                style="height: 100px">{{ old('text_five') }}</textarea>
                                                            <label for="floatingTextarea1">text</label>
                                                            <br>
                                                            @error('text_five')
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
                                        </div>
                                    </div>
                                </section>
                                <section class="overflow-hidden">
                                    <div class="row">
                                        <div class="col-lg-6 mt-5 pt-5 px-5  ">
                                            <img src="{{ asset('front/images/about-us/about-icon-1.png') }}"
                                                alt="">

                                            <div class="form-floating my-5 ">
                                                <input required dir="rtl" name="title_five"
                                                    value="{{ old('title_five') }}" type="text" class="form-control"
                                                    id="floatingInput2" placeholder="">
                                                <label for="floatingInput2">title</label>
                                                @error('title_five')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_six" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_six') }}</textarea>
                                                <label for="floatingTextarea1">text</label>
                                                <br>
                                                @error('text_six')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" col-md-6 my-5 py-5 ">
                                            <label for="formFile" class="form-label">Image </label>
                                            <input class="form-control" name="img_one" type="file" id="formFile">
                                            @error('img_one')
                                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class=" col-md-6 my-5 py-5">
                                            <label for="formFile" class="form-label">Image </label>
                                            <input class="form-control" name="img_two" type="file" id="formFile">
                                            @error('img_two')
                                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mt-5 pt-5 px-5  ">
                                            <img src="{{ asset('front/images/about-us/about-icon-1.png') }}"
                                                alt="">

                                            <div class="form-floating my-5 ">
                                                <input required dir="rtl" name="title_six"
                                                    value="{{ old('title_six') }}" type="text" class="form-control"
                                                    id="floatingInput2" placeholder="">
                                                <label for="floatingInput2">title</label>
                                                @error('title_six')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_seven" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_seven') }}</textarea>
                                                <label for="floatingTextarea1">text</label>
                                                <br>
                                                @error('text_seven')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mt-5 pt-5 px-5  ">
                                            <img src="{{ asset('front/images/about-us/about-icon-1.png') }}"
                                                alt="">

                                            <div class="form-floating my-5 ">
                                                <input required dir="rtl" name="title_seven"
                                                    value="{{ old('title_seven') }}" type="text" class="form-control"
                                                    id="floatingInput2" placeholder="">
                                                <label for="floatingInput2">title</label>
                                                @error('title_seven')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating">
                                                <textarea class="form-control" name="text_eight" required placeholder="Leave a comment here" id="floatingTextarea1"
                                                    style="height: 100px">{{ old('text_eight') }}</textarea>
                                                <label for="floatingTextarea1">text</label>
                                                <br>
                                                @error('text_eight')
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                        role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" col-md-6 my-5  py-5">
                                            <label for="formFile" class="form-label">Image </label>
                                            <input class="form-control" name="img_three" type="file" id="formFile">
                                            @error('img_three')
                                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror


                                            <div class="form-floating mt-5 ">
                                                <select dir="rtl" class="form-select" name="lang"
                                                    id="floatingSelect" aria-label="Floating label select example">

                                                    @foreach ($langs as $lang)
                                                        <option value="{{ $lang }}">
                                                            {{ $lang }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <label for="floatingSelect">Language</label>
                                            </div>
                                        </div>
                                    </div>



                                </section>

                                <div class="row">

                                    <h1 class="my-5">for seo</h1>
                                    <div class="form-floating mb-3 c col-md-6">
                                        <input dir="rtl" onkeyup="counterTitle(this)" value="{{ old('title') }}"
                                            name="title" type="text" required class="form-control"
                                            id="floatingInput" placeholder="title">
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
                                            required class="form-control" id="floatingInput" placeholder="description">{{ old('description') }}</textarea>
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

                            </div>
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

                            <div>
                                <button class="btn btn-success p-3 m-3" type="submit">save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('admin/js/count.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/copy.js') }}"></script>


    <script type="text/javascript">
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('summery', options);
        CKEDITOR.replace('body', options);
    </script>
    {{-- @include('admin.layouts.sweet_alert_error') --}}
@endsection
