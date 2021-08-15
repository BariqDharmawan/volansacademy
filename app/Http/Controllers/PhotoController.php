<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoFormRequest;
use App\Subclass;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class PhotoController extends Controller
{

    public function index(Subclass $subclass, Request $request)
    {
        if ($request->ajax()) {
            $photos = $subclass->photos;
            return DataTables::of($photos)
                ->addIndexColumn()
                ->addColumn('action', function ($photo) {
                    $subclass = $photo->subclass;
                    $action = view('pages.photos.action', compact('photo', 'subclass'));;
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return redirect('/');
    }

    public function create(Subclass $subclass)
    {
		return view('pages.photos.create', compact('subclass'));
    }

    public function store(Subclass $subclass, PhotoFormRequest $request)
    {
		$input = $request->all();
        
		$photo = Photo::create($input  + ['subclass_id' => $subclass->id]);
		
		//move 
		if ($request->hasFile('photo')) {
            $resource   = $request->file('photo');
            $name       = 'photo' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclassphotoalumni/".$photo->id."", $name);
            $photo->photo = $name;
            $photo->save();
        }
		
        return redirect()->route('classes.subclasses.photo', $subclass->id)
            ->with('success', 'Photo Alumni Sub Class Berhasil Dibuat');
    }

    public function show(Subclass $subclass, Photo $photo)
    {
        return view('pages.photos.show', compact('subclass', 'photo'));
    }

    public function edit(Subclass $subclass, Photo $photo)
    {
        return view('pages.photos.edit', compact('subclass', 'photo'));
    }

    public function update(Subclass $subclass, PhotoFormRequest $request, Photo $photo)
    {
		$photo->update($request->all());
        
        //move 
		if ($request->hasFile('photo')) {
            $resource   = $request->file('photo');
            $name       = 'photo' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclassphotoalumni/".$photo->id."", $name);
            $photo->photo = $name;
            $photo->save();
        }
		
		
		return redirect()->route('classes.subclasses.photo', $subclass->id)
            ->with('success', 'Photo ALumni Sub Class Berhasil Diperbarui');
    }

    public function destroy(Subclass $subclass, Photo $photo)
    {
		$file = $photo->photo;
        if($photo->delete()){
			if(file_exists(\base_path() . "/public/subclassphotoalumni/".$file))
				unlink(\base_path() . "/public/subclassphotoalumni/".$file);	
		}
		
        return redirect()->route('classes.subclasses.photo', $subclass->id)
            ->with('success', 'Photo ALumni Sub Class Berhasil Dihapus');
    }
}
