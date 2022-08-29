@extends('layouts.admin')

@section('title')
    Add Setting
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/index/list.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                        <a href="{{ route('admin.settings.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <div class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.settings.create') . '?type=Text' }}">Text</a></li>
                                <li><a href="{{ route('admin.settings.create') . '?type=Textarea' }}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Key setting</th>
                                    <th scope="col">Value setting</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->id }}</td>
                                        <td>{{ $setting->config_key }}</td>
                                        <td>{{ $setting->config_value }}</td>
                                        <td>
                                            <a href="{{ route('admin.settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                                                class="btn btn-default">
                                                Edit
                                            </a>
                                            <a href="{{ route('admin.settings.delete', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                                                data-url={{ route('admin.settings.delete', ['id' => $setting->id]) }}
                                                class="btn btn-danger action_delete">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $settings->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="{{ asset('admins/setting/index/list.js') }}"></script> --}}
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection
