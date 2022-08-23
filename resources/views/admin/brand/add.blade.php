@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Brand Add
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Brand', 'key' => 'Add'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Something wrong please check below
                            </div>
                        @endif
                        <form action="{{ route('admin.brands.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Brand name</label>
                                <input type="text" class="form-control" placeholder="Enter brand name..." name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Brand slug</label>
                                <input type="text" class="form-control" placeholder="Enter slug name..."
                                    name="slug" value="{{old('slug')}}">
                                    @error('slug')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
