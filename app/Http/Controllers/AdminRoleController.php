<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Action\EditActionRequest;
use App\Http\Requests\Admin\Role\AddRoleRequest;
use App\Http\Requests\Admin\Role\EditRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this
            ->role
            ->paginate(5);

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.add');
    }

    public function store(AddRoleRequest $request)
    {
        try {
            DB::beginTransaction();

            $this
                ->role
                ->create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'user_id' => Auth::user()->id,
                    'created_by' => Auth::user()->name
                ]);

            $msg = 'Add role successfully';
            $error = null;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $error = 'Add role failed';
            $msg = null;
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('msg', $msg)
            ->with('error', $error);
    }

    public function edit(Request $request, Role $role)
    {
        $request->session()->put('roleId', $role->id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request)
    {
        if ($request->session()->has('roleId'))
            $roleId = $request
                ->session()
                ->get('roleId');

        try {
            DB::beginTransaction();

            $this
                ->role
                ->find($roleId)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'user_id' => Auth::user()->id,
                    'created_by' => Auth::user()->name
                ]);

            $msg = 'Edit role successfully';
            $error = '';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $error = 'Edit role failed';
        }

        return back()
            ->with('msg', $msg)
            ->with('error', $error);
    }

    public function delete(Request $request, Role $role)
    {
        try {
            DB::beginTransaction();

            $this
                ->role
                ->find($role->id)
                ->delete();

            $msg = 'Delete role successfully';
            $error = null;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $error = 'delete role failed';
            $msg = null;
        }

        return back()
            ->with('msg', $msg)
            ->with('error', $error);
    }
}