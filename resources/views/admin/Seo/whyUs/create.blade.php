@extends('admin.layouts.master')

@section('title')
    <title>SEO FOR why hit PAGE</title>
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
                        <li class="breadcrumb-item active">Create SEO FOR why hit PAGE</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('whyus-page.store') }}" method="POST">
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
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                        id="floatingInput" placeholder="name">
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
                                <div class="form-floating mb-5 col-md-4">
                                    <select class="form-select" name="location" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="header">header</option>
                                        <option value="script">script</option>

                                    </select>
                                    <label for="floatingSelect">Location</label>
                                </div>

                                <div class="form-floating mb-3 c col-md-6">
                                    <textarea style="height: 150px" name="script" type="text" required class="form-control" id="floatingInput"
                                        placeholder="script">{{ old('script') }}</textarea>
                                    <label for="floatingInput">script</label>
                                    <br>
                                    @error('script')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
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
    {{-- @include('admin.layouts.sweet_alert_error') --}}
@endsection
