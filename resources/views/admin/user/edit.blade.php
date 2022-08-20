@extends('layouts.admin')

@section('title')
    {{-- <title>Trang chủ</title> --}}
    Edit user
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'User', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            @if ($errors->any())
                <div class="alert alert-danger">Invalid entered values, please check again</div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.users.update', $userInfo->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <input type="text" class="form-control" placeholder="Enter fullname..."
                                    value="{{ old('name') ?? $userInfo->name }}" name="name">
                                @error('name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" placeholder="Enter user's email" name="email"
                                    value="{{ old('email') ?? $userInfo->email }}">
                                @error('email')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="passwordInput"
                                    placeholder="Enter user's password" name="password">
                                <div class="row align-items-center m-2"><input type="checkbox"
                                        onclick="togglePassword()">Show
                                    Password</div>
                                @error('password')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="address d-flex">
                                <div class="form-group">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" placeholder="Enter Street" name="street"
                                        value="{{ old('street') ?? $userInfo->street }}">
                                    @error('street')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ward">Ward</label>
                                    <input type="text" class="form-control" placeholder="Enter ward" name="ward"
                                        value="{{ old('ward') ?? $userInfo->ward }}">
                                    @error('ward')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="district">District</label>
                                    <input type="text" class="form-control" placeholder="Enter district" name="district"
                                        value="{{ old('district') ?? $userInfo->district }}">
                                    @error('district')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Choose suitable role for user</label>
                                <select class="form-control" name="role">
                                    <option value="0">Roles</option>
                                    @if (!empty('roleList'))
                                        @foreach ($roleList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('role') ?? $userInfo->role_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('role')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary mb-5 ml-4">Update</button>
                                <a href="{{ route('admin.users.index') }}"class="btn btn-danger mb-5 ml-4 text-white">Back
                                    to
                                    Home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        function togglePassword() {
            var x = document.getElementById("passwordInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
