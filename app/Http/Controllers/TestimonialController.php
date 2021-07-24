<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialFormRequest;
use App\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Config;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $testimonials = Testimonial::latest()->get();
            return DataTables::of($testimonials)
                ->addIndexColumn()
                ->addColumn('action', function ($testimonial) {
                    $action = view('pages.testimonials.action', compact('testimonial'));
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.testimonials.index');
    }

    public function create()
    {
        return view('pages.testimonials.create');
    }

    public function store(TestimonialFormRequest $request)
    {
        $testimonial = Testimonial::create($request->all());
		if ($request->fix_image != "") {
            $name       = 'testi'.$testimonial->id . '.png';
			copy(\base_path() . "/public/temp/".$request->fix_image, \base_path() . "/public/images/".$name);
            $testimonial->image = $name;
            $testimonial->save();
        }
		return redirect()->route('testimonial.index')
            ->with('success', 'testimonials Berhasil Dibuat');
    }

    public function show(Testimonial $testimonial)
    {
        return view('pages.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('pages.testimonials.edit', compact('testimonial'));
    }
	
	public function update(TestimonialFormRequest $request, Testimonial $testimonial)
    {
		$testimonial->testimonial = $request->testimonial;
		$testimonial->name = $request->name;
		$testimonial->from = $request->from;
        if ($request->fix_image != "") {
            $name       = 'testi'.$testimonial->id . '.png';
			copy(\base_path() . "/public/temp/".$request->fix_image, \base_path() . "/public/images/".$name);
            $testimonial->image = $name;
        }
		$testimonial->save();
		return redirect()->route('testimonial.index')
            ->with('success', 'testimonials Berhasil Diperbarui');
    }

    public function destroy(Testimonial $testimonial)
    {
		$testimonial->delete();
		return redirect()->route('testimonial.index')
            ->with('success', 'testimonials Berhasil Dihapus');
    }
}
