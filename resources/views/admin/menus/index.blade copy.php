@extends('layouts.admin')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Menu', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->id }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.menus.edit', ['id' => $menu->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('admin.menus.delete', ['id' => $menu->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
