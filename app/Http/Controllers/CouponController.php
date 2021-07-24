<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponFormRequest;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:coupon-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:coupon-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coupons = Coupon::latest()->get();
            return Datatables::of($coupons)
                ->addIndexColumn()
                ->addColumn('action', function ($coupon) {
                    $action = view('pages.coupons.action', compact('coupon'));
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.coupons.index');
    }

    public function create()
    {
        return view('pages.coupons.create');
    }

    public function store(CouponFormRequest $request)
    {
        $input = $request->all();
        
		$coupon = Coupon::create($input);
		
		return redirect()->route('coupons.index')
            ->with('success', 'coupon Berhasil Dibuat');
    }

    public function show(Coupon $coupon)
    {
        return view('pages.coupons.show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view('pages.coupons.edit', compact('coupon'));
    }

    public function update(CouponFormRequest $request, Coupon $coupon)
    {
		$coupon->update($request->all());
		return redirect()->route('coupons.index')
            ->with('success', 'coupon Berhasil Diperbarui');
    }

    public function destroy(Coupon $coupon)
    {
		$coupon->delete();
			
        return redirect()->route('coupons.index')
            ->with('success', 'coupon Berhasil Dihapus');
    }
}
