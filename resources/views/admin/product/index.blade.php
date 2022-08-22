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
                <div class="row">
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Update at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty('productList'))
                                    @foreach ($productList as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td width="15%">{{ $product->name }}</td>
                                            <td class="d-flex justify-content-center"><img
                                                    src="{{ $product->feature_image_path }}" alt=""
                                                    class="img-fluid" style="width:60px; height: 60px;"></td>
                                            <td>
                                                {{ $product->price }}
                                            </td>
                                            <td width="5%">
                                                <div class="alert alert-info d-flex justify-content-center">
                                                    {{ $product->category->name ?? '' }}</div>
                                            </td>
                                            <td>{!! $product->content !!}</td>
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
