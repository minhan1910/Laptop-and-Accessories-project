@extends('layouts.admin')

@section('title')
    Trang chủ
@endsection

@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (Session::has('msg'))
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col">Role name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created by</th>
                                    <th scope="col">Authorize</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ $role->created_by }}</td>
                                        <td width="10%">
                                            <a href="{{ route('admin.permissions.create') }}"
                                                class="btn btn-primary form-control">
                                                Authorize
                                            </a>
                                        </td>
                                        <td width="15%">
                                            <a href="{{ route('admin.roles.edit', $role) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('admin.roles.delete', $role) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
