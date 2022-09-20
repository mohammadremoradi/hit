@extends('admin.layouts.master')

@section('title')

<title>Users</title>

@endsection
@section('content')

    <section class="container">
        <div class="row">

            <div class="col-lg-12 margin-tb my-5 ">

                <div class="pull-left">

                    <h4>Users Management</h4>
                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <section class="table-responsive">
            <table class="table ">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="">Action</th>
                </tr>

                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>
                        <td>{{ $user->hours }}</td>
                        <td>

                            @if (!empty($user->getRoleNames()))

                                @foreach ($user->getRoleNames() as $v)

                                    <label class="badge badge-success">{{ $v }}</label>

                                @endforeach

                            @endif

                        </td>

                        <td>
                            @can('setting-user-role')
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::close() !!}
                            @endcan

                            @can('setting-user-promission')

                                @if ($user->is_admin === '1')
                                    <form action="{{ route('is_admin', $user->id) }}" method="POST" class="d-inline-flex">
                                        @csrf
                                        @method('PUT')
                                        <button name="is_admin" value="0" class="btn btn-danger  d-inline mt-2">Click to be not
                                            admin</button>
                                    </form>
                                @endif

                                @if ($user->is_admin === '0')
                                    <form action="{{ route('is_admin', $user->id) }}" method="POST" class="d-inline-flex">
                                        @csrf
                                        @method('PUT')
                                        <button name="is_admin" value="1" class=" d-inline btn btn-warning mt-2">Click to be
                                            admin</button>
                                    </form>
                                @endif

                              
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
        {!! $data->render() !!}
    </section>
@endsection
@section('script')

@endsection
