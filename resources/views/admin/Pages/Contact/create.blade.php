@extends('admin.layouts.master')

@section('title')
    <title>Create Contact</title>
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
                        <li class="breadcrumb-item active">Create Contact</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('contact_us.store') }}" method="POST" enctype="multipart/form-data">
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

                                <div class="form-floating mb-3 c col-md-3">
                                    <input type="email" dir="rtl" value="{{ old('email') }}" name="email"
                                        type="text" required class="form-control" id="floatingInput" placeholder="email">
                                    <label for="floatingInput">email</label>

                                    @error('email')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('address') }}" name="address" type="text"
                                        required class="form-control" id="floatingInput" placeholder="address">
                                    <label for="floatingInput">address</label>

                                    @error('address')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('phone_one') }}" name="phone_one" type="text"
                                        required class="form-control" id="floatingInput" placeholder="phone_one">
                                    <label for="floatingInput">phone one</label>

                                    @error('phone_one')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('phone_two') }}" name="phone_two" type="text"
                                        required class="form-control" id="floatingInput" placeholder="phone_two">
                                    <label for="floatingInput">phone two</label>

                                    @error('phone_two')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('instagram') }}" name="instagram" type="text"
                                        required class="form-control" id="floatingInput" placeholder="instagram">
                                    <label for="floatingInput">instagram</label>

                                    @error('instagram')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('telegram') }}" name="telegram" type="text"
                                        required class="form-control" id="floatingInput" placeholder="telegram">
                                    <label for="floatingInput">telegram</label>

                                    @error('telegram')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('youtube') }}" name="youtube" type="text"
                                        required class="form-control" id="floatingInput" placeholder="youtube">
                                    <label for="floatingInput">youtube</label>

                                    @error('youtube')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('twitter') }}" name="twitter" type="text"
                                        required class="form-control" id="floatingInput" placeholder="twitter">
                                    <label for="floatingInput">twitter</label>

                                    @error('twitter')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 c col-md-3">
                                    <input dir="rtl" value="{{ old('iframe') }}" name="iframe" type="text"
                                        required class="form-control" id="floatingInput" placeholder="iframe">
                                    <label for="floatingInput">iframe</label>

                                    @error('iframe')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">Logo</label>
                                    <input class="form-control" name="logo" type="file" id="formFile">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">logo color</label>
                                    <input class="form-control" name="logo_color" type="file" id="formFile">
                                </div>
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

@endsection
