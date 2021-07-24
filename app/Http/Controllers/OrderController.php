<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
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

    public function index(Request $request)
    {
		$user = auth()->user();
        if ($request->ajax()) {
            $orders = Order::where('user_id', '=', $user->id)->where('status', '=', $request->status)->orderBy('id', 'desc')->get();
			if(!empty($user->getRoleNames())){
				foreach($user->getRoleNames() as $v){
					if($v == 'Admin')
					{
						$orders = Order::orderBy('id', 'desc')->where('status', '=', $request->status)->get();
					}
				}
			}
			
            return Datatables::of($orders)
                ->addIndexColumn()
                ->addColumn('action', function ($order) {
                    $action = view('pages.orders.action', compact('order'));
                    return $action;
                })
                ->addColumn('tanggal', function ($order) {
                    return date('Y-m-d', strtotime($order->created_at));
                })
                ->addColumn('jatuhtempo', function ($order) {
                    return date('Y-m-d', strtotime($order->expired_at));
                })
                ->addColumn('metodepembayaran', function ($order) {
                    $paymentMethods = \Config::get('constants.duitkuPaymentMethod');
                    return $paymentMethods[$order->payment_method]['Description'] ?? '-';
                })
				->addColumn('description', function ($order) {
                    $description = "Order ".date('mdHis', strtotime($order->created_at)).$order->id;
                    return $description;
                })
				->addColumn('amount', function ($order) {
                    return number_format($order->total);
                })
                ->rawColumns(['action', 'subclass','amount'])
                ->make(true);
        }
        return view('pages.orders.index');
    }

    public function destroy(Order $order)
    {
        /*
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
		
		$cancel = \Midtrans\Transaction::cancel($order->orderid);
		
		if($cancel == "200"){
			$order->status = 'cancel';
			return redirect()->route('orders.index')
				->with('error', 'order gagal Dicancel');
		}else{
			return redirect()->route('orders.index')
				->with('error', 'order gagal Dicancel');
		}
        */

        $deleted = $order->delete();
		if($deleted){
            return redirect()->route('orders.index')
				->with('success', 'Transaksi berhasil Dicancel');
        }
        
    }

    public function show(Order $order)
    {
		return view('pages.orders.show', compact('order'));
    }
}
