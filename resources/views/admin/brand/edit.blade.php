@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Brand Edit
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Brand', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.brands.update', ['id' => $brandData->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Brand Name</label>
                                <input type="text" class="form-control" placeholder="Brand name...." name="name"
                                    value="{{ $brandData->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Brand Slug</label>
                                <input type="text" class="form-control" placeholder="Brand slug...." name="slug"
                                    value="{{ $brandData->slug }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
