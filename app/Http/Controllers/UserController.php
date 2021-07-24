<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Upgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Config;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest()->get();
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('roles', function ($user) {
                    $roles = '';
                    foreach ($user->getRoleNames() as $v)
                        $roles .= '<label class="badge badge-success">' . $v . '</label>';
                    return $roles;
                })
                ->addColumn('action', function ($user) {
                    $action = view('pages.users.action', compact('user'));
                    return $action;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('pages.users.index');
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('pages.users.create', compact('roles'));
    }

    public function store(UserFormRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil Dibuat');
    }

    public function show(User $user)
    {
        return view('pages.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('pages.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(UserFormRequest $request, User $user)
    {
        $input = $request->all();
        if ($request->input('password') != null) {
            $input['password'] = Hash::make($input['password']);
        } else unset($input['password']);
        $user->update($input);
        $user->save();
        $user->roles()->detach();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil Diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil Dihapus');
    }
	
	public function getcountactivation(){
		$count = User::where(['active' => 0, 'valid_at' => null])
			->count();
		$count += Upgrade::where(['accepted' => 0])
			->count();
		echo $count;
	}
	
	public function activate(Request $request)
    {
		$user = User::find($request->id);
		$plans = Config::get('constants.plan');
		$duration = $plans[$user->status]['Duration'];
		$valid_until = date('Y-m-d H:i:s', strtotime("+".$duration." months"));
		$user->active = 1;
		$user->valid_until = $valid_until;
		$user->valid_at = date('Y-m-d H:i:s');
		$user->save();
        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil Diaktifkan');
    }
	
	public function reactivate(Request $request)
    {
		$plans = Config::get('constants.plan');
		$duration = $plans[$user->status]['Duration'];
		
        $user = User::find($request->id);
		$valid_until = date('Y-m-d H:i:s', strtotime("+".$duration." months"));
		$user->active = 1;
		$user->valid_until = $valid_until;
		$user->valid_at = date('Y-m-d H:i:s');
		$user->save();
        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil Diaktifkan');
    }
	
	public function upgrade(Request $request)
    {
		$user = User::find($request->user_id);
		
		$plans = Config::get('constants.plan');
		$duration = $plans[$request->upgrade_to]['Duration'];
		
		$valid_until = date('Y-m-d H:i:s', strtotime("+".$duration." months"));
		$user->active = 1;
		$user->valid_until = $valid_until;
		$user->valid_at = date('Y-m-d H:i:s');
		$user->status = $request->upgrade_to;
		if($user->save()){
			
			$user->roles()->detach();
			$user->assignRole($plans[$request->upgrade_to]['Role']);
			
			$upgrade = Upgrade::where('user_id', '=', $request->user_id)
			->where('accepted', '=', 0)
			->where('upgrade_to', '=', $request->upgrade_to)
			->first();
			$upgrade->accepted = 1;
			$upgrade->save();
		}
		
        return redirect()->route('users.index')
            ->with('success', 'Pengguna Berhasil diupgrade');
    }
}
