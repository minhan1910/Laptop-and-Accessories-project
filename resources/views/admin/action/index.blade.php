@extends('layouts.admin')

@section('title')
    Action
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
                                            <a href="{{ route('admin.actions.delete', $action) }}"
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
