<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterFormRequest;
use App\Newsletter;
use App\Newsletter_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class NewsletterController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $newsletters = Newsletter::latest()->get();
            return Datatables::of($newsletters)
                ->addIndexColumn()
                ->addColumn('action', function ($newsletter) {
                    $action = view('pages.newsletters.action', compact('newsletter'));
                    return $action;
                })
				->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.newsletters.index');
    }

    public function create()
    {
        return view('pages.newsletters.create');
    }

    public function store(NewsletterFormRequest $request)
    {
        $input = $request->all();
        
		$newsletter = Newsletter::create($input);
		
        
        return redirect()->route('newsletters.index')
            ->with('success', 'newsletter Berhasil Dibuat');
    }

    public function show(Newsletter $newsletter)
    {
        return view('pages.newsletters.show', compact('newsletter'));
    }

    public function edit(Newsletter $newsletter)
    {
        return view('pages.newsletters.edit', compact('newsletter'));
    }

    public function update(NewsletterFormRequest $request, Newsletter $newsletter)
    {
		$newsletter->update($request->all());
        
		return redirect()->route('newsletters.index')
            ->with('success', 'newsletter Berhasil Diperbarui');
    }

    public function destroy(Newsletter $newsletter)
    {
		return redirect()->route('newsletters.index')
            ->with('success', 'newsletter Berhasil Dihapus');
    }
	
	public function publish(Newsletter $newsletter)
    {
		$recipients = Newsletter_email::all();
		foreach($recipients as $recipient){
			$mail = new NewsletterMail();
			$mail->title = $newsletter->title;
			$mail->body = $newsletter->body;
			$mail->subject = $newsletter->title;
			$mail->unsubscribe_link = route('newsletters.unsubscribe', $recipient->email);
			Mail::to($recipient->email)->send($mail);
		}
			
		return redirect()->route('newsletters.index')
            ->with('success', 'newsletter Berhasil dipublish');
    }
	
	public function unsubscribe($email)
    {
		$recipients = Newsletter_email::where('email', $email)->delete();
			
		return view('frontend.unsubscribe');
    }
}
