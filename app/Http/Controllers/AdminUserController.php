<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $usersList = $this->user->paginate(5);
        return view('admin.user.index', compact('usersList'));
    }

    public function create()
    {
        $roleList = Role::all();
        return view('admin.user.add', compact('roleList'));
    }
    public function store(UserRequest $request)
    {
        if (Auth::check())
            $user_id = auth()->user()->id;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'user_id' => $user_id,
            'street' => $request->street,
            'ward' => $request->ward,
            'district' => $request->district,
            'isAdmin' => RoleEnum::fromString('ADMIN')
        ];
        $checkSuccess = User::create($data);
        if ($checkSuccess) {
            return redirect()->route('admin.users.index')->with('msg', 'Add new user successfully')->with('type', 'success');
        }
    }
    public function edit(Request $request, $id)
    {
        $roleList = Role::all();
        $userInfo = $this->user::find($id);

        return view('admin.user.edit', compact('roleList', 'userInfo'));
    }
    public function update(Request $request, $id)
    {

        if (Auth::check())
            $user_id = auth()->user()->id;
        $currentPassword = $request->password;
        $rules = [
            'name' => 'required | min:6',
            'email' => 'required | email|unique:users,email,' . $id,
            'street' => 'required | min:10',
            'ward' => 'required',
            'district' => 'required',
            'role' => 'required||not_in:0'
        ];
        if ($currentPassword == null) {
            $currentPassword = $this->user::find($id)->password;
        } else {
            $currentPassword = Hash::make($request->password);
            $rules['password'] = 'min:8';
        }

        $messages = [
            'role.not_in' => 'You must choose specific role in this dropdown list',
            'email:unique' => 'email already exist on system'
        ];
        $request->password = $currentPassword;
        $request->validate($rules, $messages);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role,
            'user_id' => $user_id,
            'street' => $request->street,
            'ward' => $request->ward,
            'district' => $request->district
        ];
        $checkSuccess = $this->user::find($id)->update($data);
        if ($checkSuccess) {
            return redirect()->route('admin.users.index')->with('msg', 'Update successfully')->with('type', 'success');
        }
    }
    public function delete($id)
    {
        $checkSuccess =  $this->user::destroy($id);
        if ($checkSuccess) return back()->with('msg', 'Delete successfully')->with('type', 'success');
    }
}