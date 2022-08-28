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
        @include('partials.content-header', ['name' => 'Products', 'key' => 'List'])
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
                @if (session('err'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger }}">{{ session('err') }}</div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="md-col-12">
                        <div class="card">
                            <div class="card-header">
                                <form class="row row-cols-lg-auto g-1" action="">
                                    <div class="col-md-7 mt-3 ml-3">
                                        <span>Filter by category: </span>
                                        <select class="form-select" name="category_id">
                                            <option value="">All Category</option>
                                            @foreach ($categories as $category)
                                                @if ($category_id == $category->id)
                                                    <option value="{{ $category->id }}"selected>
                                                        {{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-7 mt-3 ml-3">
                                        <span>Filter by brand: </span>
                                        <select class="form-select ml-3" name="brand_id">
                                            <option value="">All Brands</option>
                                            @foreach ($brands as $brand)
                                                @if ($brand_id == $brand->id)
                                                    <option value="{{ $brand->id }}"selected>
                                                        {{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">
                                                        {{ $brand->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5 mt-3 ml-3">
                                        <span>Filter by date: </span>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="start"
                                                value="{{ $start }}">
                                            <input type="date" class="form-control" name="end"
                                                value="{{ $end }}">
                                        </div>
                                    </div>
                                    <div class="col-md-7 mt-3 ml-3">
                                        <div class="input-group">

                                            <div class="">
                                                <span>Filter by price: </span>
                                                <select class="form-select ml-3" name="operator" style="width: 200px;">
                                                    <option value="">All price</option>
                                                    @foreach ($operators as $key => $val)
                                                        @if ($operator == $key)
                                                            <option value="{{ $key }}"selected>
                                                                {{ $val }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $key }}">
                                                                {{ $val }}
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="ml-2 mr-2">Price start:</span><input type="text"
                                                class="form-control" name="price_start" value="{{ $price_start }}">
                                            <span class="ml-2 mr-2">Price end:</span><input type="text"
                                                class="form-control" name="price_end" value="{{ $price_end }}">
                                        </div>
                                    </div>
                                    <div class="col-md-7 mt-3 ml-3">
                                        <input type="text" class="form-control" name="q"
                                            value="{{ $q }}" placeholder="Search here">
                                    </div>
                                    <div class="col-md-5 mt-3 ml-3">
                                        <button class="btn btn-success">Search</button>
                                    </div>
                                </form>
                                <div class="col-md-12 ml-2 mt-3">
                                    <form action="{{ route('admin.products.reset-search') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success float-right m-2">Add new
                            product</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" with="30%">Description</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Update at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($productList->count() > 0)
                                    @foreach ($productList as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td width="15%">{{ $product->name }}</td>
                                            <td class="d-flex justify-content-center"><img
                                                    src="{{ $product->feature_image_path }}" alt=""
                                                    class="img-fluid" style="width:60px; height: 60px;"></td>
                                            <td>
                                                {{ number_format($product->price) }}
                                            </td>
                                            <td width="5%">
                                                <div class="alert alert-info d-flex justify-content-center">
                                                    {{ $product->category->name ?? '' }}</div>
                                            </td>
                                            <td with="30%">{!! $product->content !!}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td width="15%">
                                                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                                <a href="{{ route('admin.products.delete', ['id' => $product->id]) }}"
                                                    class="btn btn-danger delete-confirm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $productList->links() }}
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
