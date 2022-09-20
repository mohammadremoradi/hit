@extends('admin.layouts.master')

@section('title')
    <title>Create Partner</title>
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
                        <li class="breadcrumb-item active">Create Partner</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" dir="rtl" value="{{ old('url') }}" name="url"
                                        type="text" required class="form-control" id="floatingInput" placeholder="url">
                                    <label for="floatingInput">url</label>

                                    @error('url')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="formFile" class="form-label">IMG</label>
                                    <input class="form-control" name="img" type="file" id="formFile">
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
