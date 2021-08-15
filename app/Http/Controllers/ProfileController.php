<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Config;

class ProfileController extends Controller
{

    public function index()
    {
		$user = auth()->user();
        return view('pages.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
		$user = auth()->user();
        $input = $request->all();
        if ($request->input('password') != null) {
            $input['password'] = Hash::make($input['password']);
        } else unset($input['password']);
        $user->update($input);
        $user->save();
        return redirect()->route('profile')
            ->with('success', 'Pengguna Berhasil Diperbarui');
    }
	
	public function uploadimage(Request $request){
		try{
			$data = $request->image;
			$image_array_1 = explode(";", $data);
			$image_array_2 = explode(",", $image_array_1[1]);
			$data = base64_decode($image_array_2[1]);
			$path = \base_path() . "/public/temp/";
			$imageName = $request->jenis.auth()->user()->id . time(). '.png';

			file_put_contents($path.$imageName, $data);
			
			echo '<img src="'.url('/temp/'.$imageName).'" class="img-thumbnail" /><input readonly name="fix_image" value="'.$imageName.'">';
		}catch (\Illuminate\Database\QueryException $e) {
			// Do whatever you need if the query failed to execute
			return "Failed Upload IMage";
		}
	}

}
