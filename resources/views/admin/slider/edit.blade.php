@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Slider
@endsection

@section('css')
    <link href="{{ asset('admins/slider/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])
        <!-- /.content-header -->

        @if (session('msg'))
            <div class="col-md-12">
                <p class="alert alert-success">
                    {{ session('msg') }}
                </p>
            </div>
        @endif
        <form action="{{ route('admin.sliders.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data"
            accept-charset="UTF-8">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="email">Tên slider</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="name"
                                    value="{{ $slider->name }}">

                                @error('name')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Miêu tả</label>
                                <input type="text" class="form-control" placeholder="Nhập giá sản phẩm..."
                                    name="description" value="{{ $slider->description }}">

                                @error('description')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" placeholder="Chọn ảnh đại diện..."
                                    name="image_path">
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="image_slider_detail" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
                                @error('image_path')
                                    <div class="col-md-12 mt-3">
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
