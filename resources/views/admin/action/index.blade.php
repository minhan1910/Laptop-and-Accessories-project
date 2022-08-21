@extends('layouts.admin')

@section('title')
    Action
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/action/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Action', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
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
                    <div class="col-md-12">
                        <a href="{{ route('admin.actions.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Action name</th>
                                    <th scope="col">Action has permissions</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actions as $action)
                                    <tr>
                                        <td class="text-center">{{ $action->id }}</td>
                                        <td>{{ $action->name }}</td>
                                        <td>
                                            @if (array_key_exists($action->name, $permisisonNamesForEachAction))
                                                @foreach ($permisisonNamesForEachAction[$action->name] as $permission)
                                                    {{ $permission->name }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.actions.edit', $action) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('admin.actions.get-delete', $action) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $actions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/action/edit/edit.js') }}"></script>
@endsection
