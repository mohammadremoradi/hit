@extends('admin.layouts.master')

@section('title')
    <title>Register Form</title>
@endsection



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register Applicant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Register Applicant</li>
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
                            <h3 class="card-title">Register </h3>
                        </div>


                        <div class="card-body row ">
                            <div class="col-md-3 my-3">
                                <span class="text-primary">FullName:</span>
                                <span>{{ $register_form->fullname }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">current citizenship:</span>
                                <span>{{ $register_form->current_citizenship }}</span>
                            </div>

                            <div class="col-md-3 my-3">
                                <span class="text-primary">passport number :</span>
                                <span>{{ $register_form->passport_number }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">Mother's name :</span>
                                <span>{{ $register_form->mother_name }}</span>
                            </div>

                            <div class="col-md-3 my-3">
                                <span class="text-primary">Sex :</span>
                                <span>{{ $register_form->sex }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">Birth day :</span>
                                <span>{{ $register_form->birth_day }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">Address :</span>
                                <span>{{ $register_form->address }}</span>
                            </div>

                            <div class="col-md-3 my-3">
                                <span class="text-primary">Post code :</span>
                                <span>{{ $register_form->post_code }}</span>
                            </div>

                            <div class="col-md-3 my-3">
                                <span class="text-primary">Nationality :</span>
                                <span>{{ $register_form->nationality }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">email :</span>
                                <span>{{ $register_form->email }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">phone :</span>
                                <span>{{ $register_form->phone }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">Agent email :</span>
                                <span>{{ $register_form->agent_email }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">degree :</span>
                                <span>{{ $register_form->degree }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">major :</span>
                                <span>{{ $register_form->major }}</span>
                            </div>
                            <div class="col-md-3 my-3">
                                <span class="text-primary">program :</span>
                                <span>{{ $register_form->course->title }}</span>
                            </div>

                            <div class="col-md-3 my-3">
                                <span class="text-primary">passport :</span>
                                <span> <a class="btn  btn-success" href="{{ route('register.form.download' , $register_form->id) }}">Download </a> </span>
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
