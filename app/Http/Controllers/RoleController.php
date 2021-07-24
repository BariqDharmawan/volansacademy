<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::latest()->get();
            return Datatables::of($roles)
                ->addIndexColumn()
                ->editColumn('created_at', function ($role) {
                    return $role->created_at->format('d, M Y H:i');
                })
                ->editColumn('updated_at', function ($role) {
                    return $role->updated_at->format('d, M Y H:i');
                })
                ->addColumn('action', function ($role) {
                    $action = view('pages.roles.action', compact('role'));;
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.roles.index');
    }

    public function create()
    {
        $permission = Permission::get();
        return view('pages.roles.create', compact('permission'));
    }

    public function store(RoleFormRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Peran Berhasil Dibuat');
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $role->id)
            ->get();

        return view('pages.roles.show', compact('role', 'rolePermissions'));
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
