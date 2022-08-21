@extends('layouts.admin')

@section('title')
    Add
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/action/index/index.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Action', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('admin.actions.update') }}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @if (Session::has('msg'))
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="">Choose permisison</label>
                                <select class="form-control select_permission" name="permission_id"
                                    data-url={{ route('admin.actions.select-permisison_name') }}>
                                    <option value="0">Choose permisison</option>
                                    @if (!empty($permissions))
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Action name</label>
                                <input type="text" class="form-control" value="{{ old('name') ?? $action->name }}"
                                    name="name">
                            </div>

                            <div class="form-group">
                                <label for="name">Current action name</label>
                                <input type="text" class="form-control action_current_names" disabled>
                                <select class="action_names_hidden" name="actions[]" multiple="multiple" hidden></select>
                            </div>

                            <div class="form-group">
                                <label for="name">Current permisison name</label>
                                <input type="text" class="form-control permission_names"
                                    value="{!! $currentPermissionsHtml !!}"disabled>
                            </div>
                        </div>
                        <input type="hidden">
                        <div class="col-md-12 mt-3">
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
    <script src="{{ asset('admins/action/index/index.js') }}"></script>
@endsection
