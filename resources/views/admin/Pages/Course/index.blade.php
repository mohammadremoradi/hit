@extends('admin.layouts.master')

@section('title')
    <title>courses</title>
@endsection



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Courses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
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
                            <h3 class="card-title">Courses</h3>
                            <div class="float-right mb-5">
                                <a class="btn btn-success" href="{{ route('course.create') }}"> Create </a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive ">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>Language</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informations as $information)
                                        <tr>
                                            <td>{{ $information->title }}</td>
                                            <td>
                                                {{ $information->lang }}
                                            </td>
                                            <td style="text-align:center;" class="d-flex">
                                                <a href="{{ $information->lang == 'hu' ? route('course.hu', $information->slug) : route('course.en', $information->slug) }}"
                                                    class="btn btn-sm btn-outline-success px-3 my-0 mx-1">
                                                    <i class="far fa-check-square"></i>
                                                </a>
                                                <a href="{{ route('course.edit', $information->id) }}"
                                                    class="btn btn-sm btn-outline-warning px-3 my-0 mx-1"><i
                                                        class="fas fa-edit"></i>
                                                </a>

                                                <form class="d-inline"
                                                    action="{{ route('course.destroy', $information->id) }}" method="post">
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
