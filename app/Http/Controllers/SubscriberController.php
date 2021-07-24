<?php

namespace App\Http\Controllers;

use App\Newsletter_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subscribers = Newsletter_email::latest()->get();
            return Datatables::of($subscribers)
                ->addIndexColumn()
                ->addColumn('action', function ($subscriber) {
                    $action = view('pages.subscribers.action', compact('subscriber'));
                    return $action;
                })
				->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.subscribers.index');
    }

    public function create()
    {
        return view('pages.newsletters.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
		$newsletter = Newsletter_email::create($input);
        
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

    public function destroy(Newsletter_email $subscriber)
    {
		$subscriber->delete();
		return redirect()->route('subscribers.index')
            ->with('success', 'subscriber Berhasil Dihapus');
    }
	
	
}
