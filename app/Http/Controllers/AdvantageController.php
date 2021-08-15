<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvantageFormRequest;
use App\Advantage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdvantageController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $advantages = Advantage::latest()->get();
            return Datatables::of($advantages)
                ->addIndexColumn()
                ->addColumn('action', function ($advantage) {
                    $action = view('pages.advantages.action', compact('advantage'));
                    return $action;
                })
				->addColumn('title_ens', function ($advantage) {
                    return strip_tags($advantage->title);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.advantages.index');
    }

    public function create()
    {
        return view('pages.advantages.create');
    }

    public function store(AdvantageFormRequest $request)
    {
        $input = $request->all();
        
		$advantage = Advantage::create($input);
		
		//move 
		if ($request->hasFile('image')) {
            $resource   = $request->file('image');
            $name       = $advantage->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/advantage", $name);
            $advantage->image = $name;
            $advantage->save();
        }
		return redirect()->route('advantages.index')
            ->with('success', 'advantage Berhasil Dibuat');
    }

    public function show(Advantage $advantage)
    {
        return view('pages.advantages.show', compact('advantage'));
    }

    public function edit(Advantage $advantage)
    {
        return view('pages.advantages.edit', compact('advantage'));
    }

    public function update(AdvantageFormRequest $request, Advantage $advantage)
    {
		$advantage->update($request->all());
        //move 
		if ($request->hasFile('image')) {
			if(file_exists(\base_path() . "/public/advantage/".$advantage->image) && $advantage->image != "")
				unlink(\base_path() . "/public/advantage/".$advantage->image);	
            $resource   = $request->file('image');
            $name       = $advantage->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/advantage", $name);
            $advantage->image = $name;
			$advantage->save();
        }
		
		return redirect()->route('advantages.index')
            ->with('success', 'advantage Berhasil Diperbarui');
    }

    public function destroy(Advantage $advantage)
    {
		$file = $advantage->image;
        if($advantage->delete()){
			if($file != "" && file_exists(\base_path() . "/public/advantagefile/".$file))
				unlink(\base_path() . "/public/advantagefile/".$file);	
		}
		
        return redirect()->route('advantages.index')
            ->with('success', 'advantage Berhasil Dihapus');
    }
}
