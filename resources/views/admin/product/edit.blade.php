@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Add Product
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <!-- /.content-header -->

        <form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="POST"
            enctype="multipart/form-data" accept-charset="UTF-8">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="email">Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="name"
                                    value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" class="form-control" placeholder="Nhập giá sản phẩm..." name="price"
                                    value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" placeholder="Chọn ảnh đại diện..."
                                    name="feature_image_path">
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="image_product_detail" src="{{ $product->feature_image_path }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh chi tiết</label>
                                <input type="file" class="form-control-file" placeholder="Nhập nhiều ảnh chi tiết..."
                                    multiple name="image_path[]">
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach ($product->productImages as $productImage)
                                            <div class="col-md-3 mt-2"><img class="image_product_detail"
                                                    src="{{ $productImage->image_path }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Chọn danh mục</label>
                                <select class="form-control select2-init" name="category_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach ($product->tags as $tag)
                                        <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea name="contents" id="" cols="30" rows="10" class="form-control tinymce_editor_init">
                                    {{ $product->content }}
                                </textarea>
                            </div>
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
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
