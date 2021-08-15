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
use App\Coupon;
use App\Banner;
use App\Advantage;
use App\Helper;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterConfirmMail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
	 
	public function subscribersStore(Request $request){
		$mail = new NewsletterConfirmMail();
		$mail->title = "Konfirmasi berlangganan Newsletter Volanseducation";
		$mail->body = "Klik link ddibawah ini untuk berlangganan newsletter dari volanseducation.<br><a href='".route('subscribers-store-confirm', $request->email)."'>Berlangganan</a><br>Abaikan jika anda tidak merasa melakukan permintaan berlangganan newsletter";
		$mail->subject = "Konfirmasi berlangganan Newsletter Volanseducation";
		Mail::to($request->email)->send($mail);
		
		return view('frontend.subscribe');
	}
	
	public function subscribersStoreConfirm(Request $request){
		
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
	
	public function subcourses(Subclass $subclass)
    {
		$blogs = Blog::latest()->get();
		return view('frontend.subcourses', compact('subclass','blogs'));
    }
	
	public function handlingnotif(Request $request)
    {
		echo 'sukses';
    }

}
