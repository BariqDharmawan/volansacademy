<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionFormRequest;
use App\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:division-list|division-create|division-edit|division-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:division-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:division-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:division-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $divisions = Division::latest()->get();
            return Datatables::of($divisions)
                ->addIndexColumn()
                ->addColumn('action', function ($division) {
                    $action = view('pages.divisions.action', compact('division'));
                    return $action;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('pages.divisions.index');
    }

    public function create()
    {
        return view('pages.divisions.create');
    }

    public function store(DivisionFormRequest $request)
    {
        $input = $request->all();
        
		$division = Division::create($input);
        
        return redirect()->route('divisions.index')
            ->with('success', 'Divisi Berhasil Dibuat');
    }

    public function show(Division $division)
    {
        return view('pages.divisions.show', compact('division'));
    }

    public function edit(Division $division)
    {
        return view('pages.divisions.edit', compact('division'));
    }

    public function update(DivisionFormRequest $request, Division $division)
    {
        $input = $request->all();
        $division->update($input);
        $division->save();
        return redirect()->route('divisions.index')
            ->with('success', 'Divisi Berhasil Diperbarui');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index')
            ->with('success', 'Divisi Berhasil Dihapus');
    }
}
