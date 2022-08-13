@extends('layouts.admin')

@section('title')
    Add Product
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <img class="product_image_150_100" src="{{ $product->feature_image_path }}"
                                                alt="" />
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('admin.products.delete', ['id' => $product->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
