@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Add
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Category', 'key' => 'Add'])
        <!-- /.content-header -->
        @if (session('err'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger }}">{{ session('err') }}</div>
                </div>
            </div>
        @endif
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Category name</label>
                                <input type="text" class="form-control" placeholder="Enter category name..."
                                    name="name">
                                @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Parent category name</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Choose parent category</option>
                                    {!! $htmlOption !!}
                                </select>
                                {{-- @error('parent_id')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
