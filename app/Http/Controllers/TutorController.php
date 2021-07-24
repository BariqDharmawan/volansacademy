<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorFormRequest;
use App\Tutor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Config;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tutor-list|tutor-create|tutor-edit|tutor-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tutor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tutor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tutor-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tutors = Tutor::latest()->get();
            return DataTables::of($tutors)
                ->addIndexColumn()
                ->addColumn('action', function ($tutor) {
                    $action = view('pages.tutors.action', compact('tutor'));
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.tutors.index');
    }

    public function create()
    {
        return view('pages.tutors.create');
    }

    public function store(TutorFormRequest $request)
    {
        $tutor = Tutor::create($request->all());
		if ($request->fix_image != "") {
            $name       = 'tutor'.$tutor->id . '.png';
			copy(\base_path() . "/public/temp/".$request->fix_image, \base_path() . "/public/images/".$name);
            $tutor->image = $name;
            $tutor->save();
        }
		return redirect()->route('tutors.index')
            ->with('success', 'tutor Berhasil Dibuat');
    }

    public function show(Tutor $tutor)
    {
        return view('pages.tutors.show', compact('tutor'));
    }

    public function edit(Tutor $tutor)
    {
        return view('pages.tutors.edit', compact('tutor'));
    }
	
	public function update(TutorFormRequest $request, Tutor $tutor)
    {
        $tutor->update($request->all());
		
		if ($request->fix_image != "") {
            $name       = 'tutor'.$tutor->id . '.png';
			copy(\base_path() . "/public/temp/".$request->fix_image, \base_path() . "/public/images/".$name);
            $tutor->image = $name;
            $tutor->save();
        }
		return redirect()->route('tutors.index')
            ->with('success', 'tutor Berhasil Diperbarui');
    }

    public function destroy(Tutor $tutor)
    {
		$tutor->delete();
		return redirect()->route('tutors.index')
            ->with('success', 'tutor Berhasil Dihapus');
    }
}
