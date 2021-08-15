<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('pages.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
        Role::create($request->validated());

        return redirect()->route('roles.index')->with('success', 'Peran Berhasil Dibuat');
    }

    public function show(Role $role)
    {
        $admins = User::where('is_admin', true)->get();

        return view('pages.roles.show', compact('admins'));
    }

    public function edit(Role $role)
    {
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('pages.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(RoleFormRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Peran Berhasil Diperbarui');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Peran Berhasil Dihapus');
    }
}
