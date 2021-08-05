<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clas;
use App\Blog;
use App\Subclass;
use App\Order;
use App\Order_detail;
use App\Video;
use App\Testimonial;
use App\Tutor;
use App\Newsletter_email;
use App\Cart;
use App\Coupon;
use App\Banner;
use App\Advantage;
use App\Helper;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterConfirmMail;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\TextUI\Help;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session()->put('url.intended', \Request::fullUrl());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 
	public function subscribersstore(Request $request){
		$mail = new NewsletterConfirmMail();
		$mail->title = "Konfirmasi berlangganan Newsletter Volanseducation";
		$mail->body = "Klik link ddibawah ini untuk berlangganan newsletter dari volanseducation.<br><a href='".route('subscribersstoreconfirm', $request->email)."'>Berlangganan</a><br>Abaikan jika anda tidak merasa melakukan permintaan berlangganan newsletter";
		$mail->subject = "Konfirmasi berlangganan Newsletter Volanseducation";
		Mail::to($request->email)->send($mail);
		
		return view('frontend.subscribe');
	}
	
	public function subscribersstoreconfirm(Request $request){
		
		//cek sudah ada atau belum, jika sudah ada tidak perlu insert.
		$exist = Newsletter_email::where('email', $request->email)->count();
		if(!$exist){
			$newsletter_email = new Newsletter_email;
			$newsletter_email->email = $request->email;
			$newsletter_email->save();
		}
		
		return view('frontend.subscribeconfirm');
	}
	
	
    public function index()
    {
		$classes = Clas::where('inactive', 0)->has('subclasses')
                ->orderBy('created_at', 'asc')->get();
        
		$blogs = Blog::latest()->get();
		$videos = Video::where('inactive', 0)->limit(4)->get();
		$testimonials = Testimonial::latest()->get();
		$tutors = Tutor::latest()->get();
		$banners = Banner::orderBy('created_at', 'asc')->get();
		$advantages = Advantage::take(6)->get();

        //this is static
        $companies = Helper::getJson('companies.json');
        $categoriesClass = Helper::getJson('category-class.json');

		return view('frontend.index', compact('classes', 'blogs', 'videos', 'testimonials', 'tutors', 'banners', 'advantages', 'companies', 'categoriesClass'));
    }
	
	public function course(Subclass $subclass)
    {
		$blogs = Blog::latest()->get();
		return view('frontend.course', compact('subclass','blogs'));
    }
	
	public function courses()
    {
		$classes = Clas::where('inactive', 0)->orderBy('created_at', 'asc')
                ->with('subclasses')->has('subclasses')->get();
        
		$blogs = Blog::latest()->get();

		return view('frontend.courses', compact('classes','blogs'));
    }
	
	public function news(Request $request)
    {
		$halaman = 3; //batasan halaman
		$page = $request->halaman != null ? (int)$request->halaman:1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$blogs_all = Blog::orderBy('created_at', 'desc')->get();
		$blogs = Blog::orderBy('created_at', 'desc')->skip($mulai)->take($halaman)->get();
		$total = $blogs_all->count();
		$pages = ceil($total/$halaman); 
		
		$recentblogs = Blog::latest()->limit(3)->get();
		return view('frontend.blogs', compact('blogs','recentblogs', 'pages'));
    }
	
	public function article(Blog $blog)
    {
		$prevblog = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->limit(1)->first();
		$nextblog = Blog::where('id', '>', $blog->id)->orderBy('id', 'desc')->limit(1)->first();
		$recentblogs = Blog::latest()->limit(3)->get();
		return view('frontend.blog', compact('blog','recentblogs','prevblog','nextblog'));
    }
	
	public function subcourses(Clas $class)
    {
		$subclasses =  Subclass::where('inactive', 0)->where('class_id', $class->id)->get();
		$blogs = Blog::latest()->get();
		return view('frontend.subcourses', compact('subclasses', 'class','blogs'));
    }
	
	public function handlingnotif(Request $request)
    {
		echo 'sukses';
    }

	public function addToCart(Request $request){
		$subclass_id = $request->subclass_id;
		//cek sudah login belum
		if(!Auth::check()){
			return response()->json([
                'success' => false,
				'message' => 'Silakan login terlebih dahulu !'
            ], 200);
		}
		$user = auth()->user();
		//cek apakah item ada atau tidak
		$subclass = Subclass::find($subclass_id);
		if(!$subclass){
			return response()->json([
                'success' => false,
				'message' => 'Program tidak ditemukan !'
            ], 200);
		}
		//cek apakah item sudah expired atau belum
		if(strtotime($subclass->expired_date." ".$subclass->expired_time) < strtotime(date('Y-m-d H:i:s'))){
			return response()->json([
                'success' => false,
				'message' => 'Program sudah expired !'
            ], 200);
		}
		//cek apakah item sudah ada di keranjang atau belum
		$carts = $user->carts;
		foreach($carts as $value){
			if($value->subclass_id == $subclass_id){
				return response()->json([
					'success' => false,
					'message' => 'Program sudah ada di keranjang !'
				], 200);
			}
		}
		
		//insert ke cart.
		$added = Cart::create([
			'user_id' => $user->id,
			'qty' => 1,
			'subclass_id' => $subclass_id,
			'selected' => 1
		]);

		if($added){
			return response()->json([
				'success' => true,
				'message' => 'Program sudah ditambahkan ke keranjang !'
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'Server error !'
			], 200);
		}
	}

	public function deleteFromCart(Request $request){
		$id = $request->id;
		//cek sudah login belum
		if(!Auth::check()){
			return response()->json([
                'success' => false,
				'message' => 'Silakan login terlebih dahulu !'
            ], 200);
		}
		//cek apakah item ada atau tidak
		$cart = Cart::find($id);
		if(!$cart){
			return response()->json([
                'success' => false,
				'message' => 'Item tidak ditemukan !'
            ], 200);
		}
		//hapus dari cart.
		if($cart->delete()){
			return response()->json([
				'success' => true,
				'message' => 'Program sudah dihapus dari keranjang !'
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'Server error !'
			], 200);
		}
	}

	public function updateCart(Request $request){
		$id = $request->id;
		$voucher = $request->voucher;
		if($request->selected == "true"){
			$value = 1;
		}else{
			$value = 0;
		}
		//cek sudah login belum
		if(!Auth::check()){
			return response()->json([
                'success' => false,
				'message' => 'Silakan login terlebih dahulu !'
            ], 200);
		}
		//cek apakah item ada atau tidak
		$cart = Cart::find($id);
		if(!$cart){
			return response()->json([
                'success' => false,
				'message' => 'Item tidak ditemukan !'
            ], 200);
		}
		//update cart.
		$updated = $cart->update(['selected'=>$value]);
		if($updated)
		{
			$diskon = 0;
			//cari nilai voucher
			$voucher = Coupon::where('code', '=', $voucher)->first();
			if($voucher){
				$diskon = $voucher->discount;
			}
			//cari subtotal
			$subtotal = 0;
			foreach(auth()->user()->carts as $value){
				if($value->selected){
					if($value->subclass->price_discount > 0)
						$subtotal += $value->subclass->price_discount;
					else
						$subtotal += $value->subclass->price;
				}
			}
			$total = $subtotal - $diskon;
			return response()->json([
				'success' => true,
				'message' => 'Berhasil !',
				'subtotal' => $subtotal,
				'diskon' => number_format($diskon),
				'total' => number_format($total),
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'Server error !'
			], 200);
		}
	}

	public function cart(Request $request){
		return view('frontend.cart');
	}

	public function useVoucher(Request $request){
		$voucher = $request->voucher;
		//cek sudah login belum
		if(!Auth::check()){
			return response()->json([
                'success' => false,
				'message' => 'Silakan login terlebih dahulu !'
            ], 200);
		}
		$diskon = 0;
		//cari nilai voucher
		$voucher = Coupon::where('code', '=', $voucher)->first();
		if($voucher){
			$diskon = $voucher->discount;
			$message = "Voucher berhasil digunakan !";
		}else{
			$message = "Voucher tidak ditemukan !";
		}
		//cari subtotal
		$subtotal = 0;
		foreach(auth()->user()->carts as $value){
			if($value->selected){
				if($value->subclass->price_discount > 0)
					$subtotal += $value->subclass->price_discount;
				else
					$subtotal += $value->subclass->price;
			}
		}
		$total = $subtotal - $diskon;
		return response()->json([
			'success' => true,
			'message' => $message,
			'subtotal' => $subtotal,
			'diskon' => number_format($diskon),
			'total' => number_format($total),
		], 200);
	}

	public function checkout(Request $request){
		$voucher_code = $request->voucher;
		//cek sudah login belum
		if(!Auth::check()){
			return response()->json([
                'success' => false,
				'message' => 'Silakan login terlebih dahulu !'
            ], 200);
		}
		$diskon = 0;
		//cari nilai voucher
		$voucher = Coupon::where('code', '=', $voucher_code)->first();
		if($voucher){
			$diskon = $voucher->discount;
		}
		//cari subtotal
		$subtotal = 0;
		foreach(auth()->user()->carts as $value){
			if($value->selected){
				if($value->subclass->price_discount > 0)
					$subtotal += $value->subclass->price_discount;
				else
					$subtotal += $value->subclass->price;
			}
		}
		$total = $subtotal - $diskon;
		
		\DB::beginTransaction();

		try{

			if(env('PAYMENT_METHOD') == 'DUITKU'){
				if(strtolower(env('APP_ENV')) != 'production'){
					$merchantKey = env('DUITKU_API_KEY_SANDBOX');
					$isProduction = false;
					$merchantCode = env('DUITKU_MERCHANT_CODE_SANDBOX'); // from duitku
					$url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
				}else{
					$merchantKey = env('DUITKU_API_KEY_PRD');
					$isProduction = true;
					$merchantCode = env('DUITKU_MERCHANT_CODE_PRD'); // from duitku
					$url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
				}

				$paymentAmount = $total;
				$paymentMethod = $request->paymentMethod; // VC = Credit Card, M2 = Mandiri Virtual Account
				$merchantOrderId = time() .'_'. auth()->user()->id; // from merchant, unique
				$productDetails = 'Pay Class with duitku';
				$email = auth()->user()->email; // your customer email
				$phoneNumber = auth()->user()->phone; // your customer phone number (optional)
				$additionalParam = ''; // optional
				$merchantUserInfo = ''; // optional
				$customerVaName = auth()->user()->name; // display name on bank confirmation display
				$callbackUrl = env('APP_URL').'/api/handlingnotif'; // url for callback
				$returnUrl = env('APP_URL'); // url for redirect
				$expiryPeriod = 1440; // set the expired time in minutes
				$signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

				// Customer Detail
				$array_name = explode(" ", auth()->user()->name);
				$firstName = $array_name[0];
				$lastName = $array_name[1] ?? "";

				// Address
				$alamat = "Surabaya";
				$city = "Surabaya";
				$postalCode = "60111";
				$countryCode = "ID";

				$address = array(
					'firstName' => $firstName,
					'lastName' => $lastName,
					'address' => $alamat,
					'city' => $city,
					'postalCode' => $postalCode,
					'phone' => $phoneNumber,
					'countryCode' => $countryCode
				);

				$customerDetail = array(
					'firstName' => $firstName,
					'lastName' => $lastName,
					'email' => $email,
					'phoneNumber' => $phoneNumber,
					'billingAddress' => $address,
					'shippingAddress' => $address
				);
				$selected = 0;
				foreach(auth()->user()->carts as $value){
					if($value->selected){
						$selected++;
					}
				}
				foreach(auth()->user()->carts as $value){
					if($value->selected){
						if($value->subclass->price_discount > 0)
							$ssprce = $value->subclass->price_discount;
						else
							$ssprce = $value->subclass->price;
						$itemDetails[] = array(
							'name' => 'Subclass id : '.$value->subclass_id,
							'price' => $ssprce - ($diskon / $selected),
							'quantity' => 1
						);
					}
				}

				$params = array(
					'merchantCode' => $merchantCode,
					'paymentAmount' => $paymentAmount,
					'paymentMethod' => $paymentMethod,
					'merchantOrderId' => $merchantOrderId,
					'productDetails' => $productDetails,
					'additionalParam' => $additionalParam,
					'merchantUserInfo' => $merchantUserInfo,
					'customerVaName' => $customerVaName,
					'email' => $email,
					'phoneNumber' => $phoneNumber,
					'itemDetails' => $itemDetails,
					'customerDetail' => $customerDetail,
					'callbackUrl' => $callbackUrl,
					'returnUrl' => $returnUrl,
					'signature' => $signature,
					'expiryPeriod' => $expiryPeriod

				);

				$params_string = json_encode($params);
				
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $url); 
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
					'Content-Type: application/json',                                                                                
					'Content-Length: ' . strlen($params_string))                                                                       
				);   
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

				//execute post
				$requestapi = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if($httpCode == 200)
				{
				    
    				
					$result = json_decode($requestapi, true);
					$order = new Order();
					$order->user_id = auth()->user()->id;
					$order->coupon_code = $voucher_code;
					$order->subtotal = $subtotal;
					$order->discount = $diskon;
					$order->total = $total;
					$order->status = 'pending';
					$order->payment_id = $merchantOrderId;
					$order->payment_method = $paymentMethod;
					$order->paymentUrl = $result['paymentUrl'];
					$order->expired_at = date('Y-m-d H:i:s', strtotime('+1 days'));
					if(!$order->save())
					{
						return response()->json([
							'success' => false,
							'message' => "Gagal menyimpan transaksi (KODE: 010)",
						], 200);
					}
					foreach(auth()->user()->carts as $value){
						if($value->selected){
							$order_detail = new Order_detail();
							$order_detail->order_id = $order->id;
							$order_detail->subclass_id = $value->subclass_id;
							$order_detail->qty = 1;
							if($value->subclass->price_discount > 0)
								$order_detail->price = $value->subclass->price_discount;
							else
								$order_detail->price = $value->subclass->price;
							
							if(!$order_detail->save()){
								return response()->json([
									'success' => false,
									'message' => "Gagal menyimpan transaksi (KODE: 020)",
								], 200);
							}
						}
					}

					//hapus isi cart yg selected 1
					$deleted = Cart::where('selected', 1)->where('user_id', auth()->user()->id)->delete();
					if(!$deleted){
						return response()->json([
							'success' => false,
							'message' => "Gagal menyimpan transaksi (KODE: 030)",
						], 200);
					}

					\DB::commit();

					
					return response()->json([
						'success' => true,
						'message' => "Sukses, anda akan diarahkan ke halaman pembayaran",
						'paymentUrl' => $result['paymentUrl'],
					], 200);
				}
				else{
					//print_r($params_string);
					//print_r($url);
					//print_r($requestapi);
					return response()->json([
						'success' => false,
						'message' => 'Error Code : '.$httpCode.'<br>Message : '.$requestapi['Message'],
					], 200);
				}
			}

			
		}catch(\Exception $e){
            \DB::rollback();
            return response()->json([
				'success' => false,
				'message' => 'aaa'.$e->getMessage(),
			], 200);
        }
		
		
	}

	public function konfirmasipembayaran(Order $order){
		if(strtolower(env('APP_ENV')) != 'production'){
            $merchantKey = env('DUITKU_API_KEY_SANDBOX');
            $isProduction = false;
            $url = 'https://sandbox.duitku.com/webapi/api/merchant/transactionStatus'; // Sandbox
            $merchantCode = env('DUITKU_MERCHANT_CODE_SANDBOX'); // from duitku
        }else{
            $merchantKey = env('DUITKU_API_KEY_PRD');
            $isProduction = true;
            $url = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus'; // Sandbox
            $merchantCode = env('DUITKU_MERCHANT_CODE_PRD'); // from duitku
        }

        $merchantOrderId = $order->payment_id; // from merchant, unique

        $signature = md5($merchantCode . $merchantOrderId . $merchantKey);

        $params = array(
            'merchantCode' => $merchantCode,
            'merchantOrderId' => $merchantOrderId,
            'signature' => $signature
        );

        $params_string = json_encode($params);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params_string))                                                                       
        );   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($httpCode == 200)
        {
            $result = json_decode($request, true);
            if($result['statusCode'] == '00'){
                $order->status = 'paid';
                $order->save();
            }
            return redirect()->route('orders.index')
                ->with('success', 'Status Pembayaran :'.$result['statusMessage']);
        }
        else{
            print_r($url);
            echo "<br>";
            print_r($params_string);
            echo "<br>";
            echo $httpCode;
        }
	}
}
