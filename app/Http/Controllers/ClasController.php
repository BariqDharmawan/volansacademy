<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasFormRequest;
use App\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ClasController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $classes = Clas::all();
            return Datatables::of($classes)
                ->addIndexColumn()
                ->addColumn('action', function ($class) {
                    $action = view('pages.classes.action', compact('class'));
                    return $action;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('pages.classes.index');
    }

    public function create()
    {
        return view('pages.classes.create');
    }

    public function store(ClasFormRequest $request)
    {
        $input = $request->all();
        
		$class = Clas::create($input);
		
		//move 
		if ($request->hasFile('banner')) {
            $resource   = $request->file('banner');
            $name       = $class->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/class", $name);
            $class->banner = $name;
            $class->save();
        }
        
        return redirect()->route('classes.index')
            ->with('success', 'Program Berhasil Dibuat');
    }

    public function show(Clas $class)
    {
        return view('pages.classes.show', compact('class'));
    }

    public function edit(Clas $class)
    {
        return view('pages.classes.edit', compact('class'));
    }

    public function update(ClasFormRequest $request, Clas $class)
    {
		$class->update($request->all());
        //move 
		if ($request->hasFile('banner')) {
			if(file_exists(\base_path() . "/public/class/".$class->banner))
				unlink(\base_path() . "/public/class/".$class->banner);	
            $resource   = $request->file('banner');
            $name       = $class->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/class", $name);
            $class->banner = $name;
			$class->save();
        }
		return redirect()->route('classes.index')
            ->with('success', 'Program Berhasil Diperbarui');
    }

    public function destroy(Clas $class)
    {
		$file = $class->banner;
        if($class->delete()){
			if(file_exists(\base_path() . "/public/class/".$file))
				unlink(\base_path() . "/public/class/".$file);	
		}
		
        return redirect()->route('classes.index')
            ->with('success', 'Program Berhasil Dihapus');
    }
}
