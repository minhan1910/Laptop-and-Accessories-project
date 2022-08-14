@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Edit Setting
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/edit/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'Edit'])
        <!-- /.content-header -->

        <div class="col-md-12">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>

        <form action="{{ route('admin.settings.update', ['id' => $setting->id]) . '?type=' . $setting->type }}" method="POST"
            enctype="multipart/form-data" accept-charset="UTF-8">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="config_key">Config key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                    placeholder="Nhập config key..." name="config_key"
                                    value="{{ old('config_key') ?? $setting->config_key }}">

                                @error('config_key')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Có thể cho array để render ra view --}}
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label for="">Config value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        placeholder="Nhập config value..." name="config_value"
                                        value=" {{ old('config_value') ?? $setting->config_value }}">

                                    @error('config_value')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @elseif (request()->type === 'Textarea')
                                <textarea class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập config value..."
                                    name="config_value">{{ old('config_value') ?? $setting->config_value }}</textarea>
                            @endif

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
