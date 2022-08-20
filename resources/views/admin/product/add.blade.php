@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('admintle/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('title')
    {{-- <title>Trang chủ</title> --}}
    Product Add
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            @if ($errors->any())
                <div class="alert alert-danger">Invalid entered values, please check again</div>
            @endif
            @if (session('msg'))
                {
                <div class="alert alert-info">{{ session('msg') }}</div>
                }
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="x_panel">

                            <div class="x_content">
                                <br />
                                <form class="form-horizontal form-label-left" action="{{ route('admin.products.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Product Name..."
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Price</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Product Price..."
                                                name="price" value="{{ old('price') }}">
                                            @error('price')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3">Description
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea class="form-control" rows="3" placeholder="Product Descripion..." id="content" name="content">
                                                {{ old('content') }}</textarea>
                                            @error('content')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Main Image</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="file" name="feature_image_path" class="form-control-file"
                                                value={{ old('feature_image_path') }}>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="control-label col-md-3 col-sm-3 ">Detail Images</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="file" class="form-control-file"
                                                placeholder="More images here..." multiple name="image_path[]">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Category</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="category_id">
                                                <option value="0">Type</option>
                                                @if (!empty('categoryList'))
                                                    @foreach ($categoryList as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('category')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button type="submit" class="btn btn-success">Add new Product</button>
                                            <a href={{ route('admin.products.index') }} class="btn btn-danger">Back to
                                                Product
                                                List</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src={{ asset('admintle/plugins/summernote/summernote-bs4.min.js') }}></script>
    <script>
        $(function() {
            // Summernote
            $('#content').summernote({
                height: 250,
                placeholder: "Product description in here...."
            })

            // CodeMirror
        });
    </script>
@endsection
