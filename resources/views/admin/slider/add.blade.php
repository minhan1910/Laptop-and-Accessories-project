@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Add
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên slider..." name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image_path">Hình Ảnh</label>
                                <input type="file" class="form-control-file" name="image_path">

                                @error('image_path')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
