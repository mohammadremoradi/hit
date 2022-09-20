@extends('admin.layouts.master')

@section('title')
    <title>Edit SEO FOR register form PAGE</title>
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
                        <li class="breadcrumb-item"><a href="{{ route('register-page.index') }}">SEO FOR register form
                                PAGE</a></li>
                        <li class="breadcrumb-item active">Edit SEO FOR register form PAGE</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('register-page.update', $register_page->id) }}" method="POST">
                            @method('put')
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


                                <div class="form-floating mb-3 c col-md-4">
                                    <input name="name" value="{{ old('name', $register_page->name) }}" type="text"
                                        class="form-control" id="floatingInput" placeholder="name">
                                    <label for="floatingInput">Name</label>
                                    <br>

                                    @error('name')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-5 col-md-4">
                                    <select dir="rtl" class="form-select" name="lang" id="floatingSelect"
                                        aria-label="Floating label select example">

                                        @foreach ($langs as $lang)
                                            <option @selected($lang === $register_page->lang) value="{{ $lang }}">
                                                {{ $lang }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <label for="floatingSelect">Language</label>
                                </div>

                                <div class="form-floating mb-5 col-md-4">
                                    <select dir="rtl" class="form-select" name="location" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option @selected(old('location', $register_page->location) == 'header') value="header">
                                            header
                                        </option>
                                        <option @selected(old('location', $register_page->location) == 'script') value="script">
                                            script
                                        </option>
                                    </select>
                                    <label for="floatingSelect">Language</label>
                                </div>
                            </div>


                            <div class="form-floating col-md-6">
                                <textarea name="script" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px">{{ old('script', $register_page->script) }}</textarea>

                                @error('script')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
@endsection
