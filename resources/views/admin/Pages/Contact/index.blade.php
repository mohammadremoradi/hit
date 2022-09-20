@extends('admin.layouts.master')

@section('title')
@endsection



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
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
                            <h3 class="card-title">Contact</h3>
                            <div class="float-right mb-5">
                                @if (count($informations) < 1)
                                    <a class="btn btn-success" href="{{ route('contact_us.create') }}"> Create </a>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive ">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>social</th>
                                        <th>image</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informations as $information)
                                        <tr>
                                            <td>{{ $information->address }}</td>
                                            <td>
                                                <ul>
                                                    <li class="py-1">
                                                        {{ $information->phone_one }}
                                                    </li>
                                                    <li class="py-1">
                                                        {{ $information->phone_two }}
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li class="py-1">
                                                        <a href="{{ $information->email }}">
                                                            <i class="fa fa-envelope-open" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="{{ $information->instagram }}">
                                                            <i class=" fa-brands fa-instagram tx-size-28"></i>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="{{ $information->telegram }}">
                                                            <i class="  fa-brands fa-telegram tx-size-28"></i>
                                                        </a>
                                                    </li>

                                                    <li class="py-1">
                                                        <a href="{{ $information->youtube }}">
                                                            <i class="  fa-brands fa-youtube tx-size-28"></i> </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="{{ $information->twitter }}">
                                                            <i class=" fa-brands fa-twitter tx-size-28"></i> </a>
                                                    </li>
                                                </ul>
                                            </td>

                                            <td>

                                                <ul>
                                                    <li class="py-1">
                                                        <img width="250" src="{{ asset($information->logo) }}"
                                                            alt="">
                                                    </li>
                                                    <li class="py-1">
                                                        <img width="250" src="{{ asset($information->logo_color) }}"
                                                            alt="">
                                                    </li>

                                                </ul>
                                            </td>
                                            <td style="text-align:center;" class="d-flex">

                                                <a href="{{ route('contact_us.edit', $information->id) }}"
                                                    class="btn btn-sm btn-outline-warning px-3 my-0 mx-1"><i
                                                        class="fas fa-edit"></i>
                                                </a>

                                                <form class="d-inline"
                                                    action="{{ route('contact_us.destroy', $information->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-outline-danger delete">

                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [3, "desc"]
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
