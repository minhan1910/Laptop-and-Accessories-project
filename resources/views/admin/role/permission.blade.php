@extends('layouts.admin')

@section('title')
    Authorize
@endsection

@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Authorization'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <form action="" method="post">
                @csrf
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Modules</th>
                                        <th scope="col">Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($permissions->count() > 0)
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td width="20%">{{ $permission->name }}</td>
                                                <td>
                                                    <div class="row">
                                                        @if (array_key_exists($permission->name, $actionNamesForEachPermission))
                                                            @foreach ($actionNamesForEachPermission[$permission->name] as $action)
                                                                <div class="col-2">
                                                                    <label
                                                                        for="role_{{ $permission->name }}_{{ $action->name }}">
                                                                        {{ $action->name }}
                                                                    </label>
                                                                    <input type="checkbox"
                                                                        name="role[{{ $permission->name }}][]"
                                                                        id="role_{{ $permission->name }}_{{ $action->name }}"
                                                                        value="{{ $action->name }}"
                                                                        {{ isRole($rolePermisisons, $permission->name, $action->name) ? 'checked' : '' }} />
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-left mt-3">Authorize</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
