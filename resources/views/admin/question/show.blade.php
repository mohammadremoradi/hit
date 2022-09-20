@extends('admin.layouts.master')

@section('title')
    <title>question Form</title>
@endsection



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>question Applicant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">question Applicant</li>
                    </ol>
                </div>
            </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">question </h3>
                        </div>


                        <div class="card-body row ">
                            <div class="col-md-6 my-3">
                                <span class="text-primary">FullName:</span>
                                <span>{{ $question->fullname }}</span>
                            </div>

                            <div class="col-md-6 my-3">
                                <span class="text-primary">email :</span>
                                <span><a class="text-danger" href="mailto:{{ $question->email }}">{{ $question->email }}</a></span>
                            </div>
                            <div class="col-md-6 my-3">
                                <span class="text-primary">Subject:</span>
                                <span>{{ $question->subject }}</span>
                            </div>
                            <div class=" my-3">
                                <span class="text-primary">Message:</span>
                                <p class="">{{ $question->message }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')
@endsection
