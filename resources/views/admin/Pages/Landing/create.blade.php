@extends('admin.layouts.master')

@section('title')
    <title>Create Landing</title>
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
                        <li class="breadcrumb-item active">Create Landing</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('landing.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row p-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-floating mb-3 c col-md-6">
                                    <input dir="rtl" name="slider_text_one" value="{{ old('slider_text_one') }}"
                                        type="text" class="form-control" id="floatingInput"
                                        placeholder="slider_text_one">
                                    <label for="floatingInput">slider text one</label>
                                    <br>

                                    @error('slider_text_one')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">Image Slider</label>
                                    <input class="form-control" name="slider_image" type="file" id="formFile">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">Video About us</label>
                                    <input class="form-control" name="about_us_video" type="file" id="formFile">
                                </div>

                                <div class="form-floating mb-5 col-md-4">
                                    <select class="form-select" name="lang" id="floatingSelect"
                                        aria-label="Floating label select example">

                                        @foreach ($langs as $lang)
                                            <option @selected(old('lang') == $lang) value="{{ $lang }}">
                                                {{ $lang }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <label for="floatingSelect">Language</label>
                                </div>
                            </div>


                            <div class="form-floating">
                                <textarea id="body" name="about_us_text" onkeyup="counterBody(this)" class="form-control"
                                    placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('about_us_text') }}</textarea>

                                @error('about_us_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <h3 class="p-5">For seo</h3>

                            <section class="row">
                                <div class="form-floating mb-3 c col-md-6">
                                    <input onkeyup="counterTitle(this)" value="{{ old('title') }}" name="title"
                                        type="text" required class="form-control" id="floatingInput" placeholder="title">
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
                                    <textarea style="height: 150px" onkeyup="counterBody(this)" name="description" type="text" required
                                        class="form-control" id="floatingInput" placeholder="description">{{ old('description') }}</textarea>
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

                            </section>

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
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('body');
    </script>

    <script src="{{ asset('admin/js/copy.js') }}"></script>
    {{-- @include('admin.layouts.sweet_alert_error') --}}
@endsection
