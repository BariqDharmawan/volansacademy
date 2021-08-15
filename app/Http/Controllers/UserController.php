<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\User;
use App\Upgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Config;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('pages.users.index', ['users' => $users]);
    }

    public function store(UserFormRequest $request)
    {
        User::create($request->validated());

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
        $user->update($request->validated());
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
