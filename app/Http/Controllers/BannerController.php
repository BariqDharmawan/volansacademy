<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerFormRequest;
use App\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $banners = Banner::latest()->get();
            return Datatables::of($banners)
                ->addIndexColumn()
                ->addColumn('action', function ($banner) {
                    $action = view('pages.banners.action', compact('banner'));
                    return $action;
                })
				->addColumn('title_ens', function ($banner) {
                    return strip_tags($banner->title);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.banners.index');
    }

    public function create()
    {
        return view('pages.banners.create');
    }

    public function store(BannerFormRequest $request)
    {
        $input = $request->all();
        
		$banner = Banner::create($input);
		
		//move 
		if ($request->hasFile('image')) {
            $resource   = $request->file('image');
            $name       = $banner->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/banner", $name);
            $banner->image = $name;
            $banner->save();
        }
        if ($request->hasFile('m_image')) {
            $resource   = $request->file('m_image');
            $name       = $banner->id . 'm_image.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/banner", $name);
            $banner->m_image = $name;
            $banner->save();
        }
		return redirect()->route('banners.index')
            ->with('success', 'banner Berhasil Dibuat');
    }

    public function show(Banner $banner)
    {
        return view('pages.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('pages.banners.edit', compact('banner'));
    }

    public function update(BannerFormRequest $request, Banner $banner)
    {
		$banner->update($request->all());
        //move 
		if ($request->hasFile('image')) {
			if(file_exists(\base_path() . "/public/banner/".$banner->image) && $banner->image != "")
				unlink(\base_path() . "/public/banner/".$banner->image);	
            $resource   = $request->file('image');
            $name       = $banner->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/banner", $name);
            $banner->image = $name;
			$banner->save();
        }
        if($request->has('remove_m_image')){
            if(file_exists(\base_path() . "/public/banner/".$banner->m_image) && $banner->m_image != "")
				unlink(\base_path() . "/public/banner/".$banner->m_image);	
            $banner->m_image = "";
            $banner->save();
        }
        elseif ($request->hasFile('m_image')) {
            if(file_exists(\base_path() . "/public/banner/".$banner->m_image) && $banner->m_image != "")
				unlink(\base_path() . "/public/banner/".$banner->m_image);	
            $resource   = $request->file('m_image');
            $name       = $banner->id . 'm_image.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/banner", $name);
            $banner->m_image = $name;
            $banner->save();
        }
		
		return redirect()->route('banners.index')
            ->with('success', 'banner Berhasil Diperbarui');
    }

    public function destroy(Banner $banner)
    {
		$file = $banner->image;
        if($banner->delete()){
			if($file != "" && file_exists(\base_path() . "/public/bannerfile/".$file))
				unlink(\base_path() . "/public/bannerfile/".$file);	
		}
		
        return redirect()->route('banners.index')
            ->with('success', 'banner Berhasil Dihapus');
    }
}
