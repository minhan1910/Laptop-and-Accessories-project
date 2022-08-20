@extends('layouts.admin')

@section('title')
    Edit
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Edit'])
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
                        <form action="{{ route('admin.roles.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role name</label>
                                <input type="text" class="form-control" placeholder="Enter role name..." name="name"
                                    value=" {{ old('name') ?? $role->name }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" placeholder="Enter description..."
                                    name="description" value="{{ old('description') ?? $role->description }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
