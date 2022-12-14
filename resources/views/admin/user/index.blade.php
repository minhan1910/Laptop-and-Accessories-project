@extends('layouts.admin')

@section('title')
    Trang chủ
@endsection
@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Users', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if (session('msg') && session('type'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty('usersList'))
                                    @foreach ($usersList as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td width="15%">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                {{ $user->street }}, ward {{ $user->ward }}, district
                                                {{ $user->district }}
                                            </td>
                                            <td>
                                                <div class="alert alert-info d-flex justify-content-center">
                                                    {{ $user->role->name ?? '' }}</div>
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td width="15%">
                                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                                <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
                                                    class="btn btn-danger delete-confirm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $usersList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
