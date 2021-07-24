<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Config;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

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

	public function cekkupon(Request $request)
    {
		$exist = Coupon::where('code', '=', $request->kupon)->first();
        if($exist)
			return $exist->discount;
		else
			return "0";
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
	
	public function updatetransactionid(Request $request){
		try{
			$order = Order::where('orderid', '=', $request->order_id)
			->update([
				'transaction_id' => $request->transaction_id,
				'status' => $request->status,
				'pdf_url' => $request->pdf_url,
			]);
		}catch (\Illuminate\Database\QueryException $e) {
			// Do whatever you need if the query failed to execute
			return "1";
		}
		return "0";
	}

	public function buy(Request $request)
    {
		//cek email valid atau tidak.
		if($request->email != ""){
			$exist = User::where('email', '=', $request->email)->first();
			if(!$exist)
				return "1";
		}
		
		//insert ke order.
		$user = auth()->user();
        $order = new Order();
		$order->subclass_id = $request->subclass_id;
		$order->price = $request->price;
		$order->discount = $request->discount;
		$order->user_id = $user->id;
		$order->for_account = $request->email ?? $user->email;
		$order->coupon = $request->coupon ?? "";
		$order->status = 'pending';
		if($order->save()){
			//hit midtrans for redirect payment.
			//Set Your server key
			if(env('APP_ENV') == 'production'){
				\Midtrans\Config::$isProduction = true;
				\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY_PRD');
			}else{
				\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY_SANDBOX');
			}

			// Enable sanitization
			\Midtrans\Config::$isSanitized = true;

			// Enable 3D-Secure
			\Midtrans\Config::$is3ds = true;
			
			\Midtrans\Config::$overrideNotifUrl = env('MIDTRANS_NOTIFURL');

			// Uncomment for append and override notification URL
			// Config::$appendNotifUrl = "https://example.com";
			// Config::$overrideNotifUrl = "https://example.com";
			//Get Snap Token
			$orderid = rand();
			// Optional
			$customer_details = array(
				'first_name'    => $user->name,
				'last_name'     => "",
				'email'         => $order->for_account,
				'phone'         => $user->phone,
				'billing_address'  => $order->address,
				'shipping_address' => $order->address,
				
			);
			
			$params = array(
				'transaction_details' => array(
					'order_id' => $orderid,
					'gross_amount' => $order->price - $order->discount,
				),
				'customer_details' => $customer_details,
			);
			
			
			$snapToken = \Midtrans\Snap::getSnapToken($params);
			if($snapToken){
				$order->orderid = $orderid;
				if($order->save()){
					return $snapToken;
				}else{
					return "4";
				}
			}else{
				return "3";
			}
		}else{
			return "2";
		}
    }
}
