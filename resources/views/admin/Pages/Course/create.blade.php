@extends('admin.layouts.master')

@section('title')
    <title>Create Courses</title>
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
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                        <li class="breadcrumb-item active">Create Course</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <input  onkeyup="counterTitle(this)" value="{{ old('title') }}"
                                        name="title" type="text" required class="form-control" id="floatingInput"
                                        placeholder="title">
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
                                    <textarea style="height: 150px" onkeyup="counterBody(this)" name="description" type="text" required class="form-control"
                                        id="floatingInput" placeholder="description">{{ old('description') }}</textarea>
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

                                <div class="form-floating mb-3 c col-md-6">
                                    <input   name="credit" value="{{ old('credit') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="credit">
                                    <label for="floatingInput">credit</label>
                                    <br>

                                    @error('credit')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 c col-md-6">
                                    <input   name="duration" value="{{ old('duration') }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="duration">
                                    <label for="floatingInput">duration</label>
                                    <br>

                                    @error('duration')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-6">
                                    <input   name="start_course_day" value="{{ old('start_course_day') }}"
                                        type="text" class="form-control" id="floatingInput"
                                        placeholder="start_course_day">
                                    <label for="floatingInput">start course day</label>
                                    <br>
                                    @error('start_course_day')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-6">
                                    <input   name="start_course_month" value="{{ old('start_course_month') }}"
                                        type="text" class="form-control" id="floatingInput"
                                        placeholder="start_course_month">
                                    <label for="floatingInput">start course month</label>
                                    <br>

                                    @error('start_course_month')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="img" type="file" id="formFile">
                                    @error('img')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">Video </label>
                                    <input class="form-control" name="video" type="file" id="formFile">
                                    @error('video')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-5 col-md-4">
                                    <select   class="form-select" name="lang" id="floatingSelect"
                                        aria-label="Floating label select example">

                                        @foreach ($langs as $lang)
                                            <option @selected(old('lang') == $lang) value="{{ $lang }}">
                                                {{ $lang }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <label for="floatingSelect">Language</label>
                                </div>

                                <div class="form-floating mb-5 col-md-4">
                                    <select   class="form-select" name="course_lang" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @foreach ($langs as $lang)
                                            <option @selected(old('lang') == $lang) value="{{ $lang }}">
                                                {{ $lang }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Course Language</label>
                                </div>
                            </div>


                            <div class="form-floating my-5">
                                <h3>summery</h3>
                                <textarea id="summery" name="summary" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 100px">{{ old('summary') }}</textarea>

                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <h3>body</h3>

                                <textarea id="body" name="body" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 100px">{{ old('body') }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                                @enderror
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
