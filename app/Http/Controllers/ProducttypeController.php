<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducttypeFormRequest;
use App\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:producttype-list|producttype-create|producttype-edit|producttype-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:producttype-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:producttype-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:producttype-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $producttypes = Producttype::latest()->get();
            return Datatables::of($producttypes)
                ->addIndexColumn()
                ->addColumn('action', function ($producttype) {
                    $action = view('pages.producttypes.action', compact('producttype'));
                    return $action;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('pages.producttypes.index');
    }

    public function create()
    {
        return view('pages.producttypes.create');
    }

    public function store(ProducttypeFormRequest $request)
    {
        $input = $request->all();
        
		$producttype = Producttype::create($input);
        
        return redirect()->route('producttypes.index')
            ->with('success', 'Producttype Berhasil Dibuat');
    }

    public function show(Producttype $producttype)
    {
        return view('pages.producttypes.show', compact('producttype'));
    }

    public function edit(Producttype $producttype)
    {
        return view('pages.producttypes.edit', compact('producttype'));
    }

    public function update(ProducttypeFormRequest $request, Producttype $producttype)
    {
        $input = $request->all();
        $producttype->update($input);
        $producttype->save();
        return redirect()->route('producttypes.index')
            ->with('success', 'Producttype Berhasil Diperbarui');
    }

    public function destroy(Producttype $producttype)
    {
        $producttype->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Producttype Berhasil Dihapus');
    }
}