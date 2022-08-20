@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Add
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role name</label>
                                <input type="text" class="form-control" placeholder="Enter role name..." name="name">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" placeholder="Enter description..."
                                    name="description">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
