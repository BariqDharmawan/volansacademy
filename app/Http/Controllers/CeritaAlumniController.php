<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoFormRequest;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class CeritaAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:video-list|video-create|video-edit|video-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:video-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:video-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $videos = Video::latest();
            return DataTables::of($videos)
                ->addIndexColumn()
                ->addColumn('action', function ($video) {
                    $action = view('pages.cerita-alumni.action', compact('video'));
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.cerita-alumni.index');
    }

    public function create()
    {
		return view('pages.cerita-alumni.create');
    }

    public function store(VideoFormRequest $request)
    {
        $input = $request->all();
        
		$video = Video::create($input);
		
		//move 
		if ($request->hasFile('image')) {
            $resource   = $request->file('image');
            $name       = $video->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/videoimage", $name);
            $video->image = $name;
            $video->save();
        }
		
		if ($request->hasFile('video')) {
            $resource   = $request->file('video');
            $name       = $video->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/video", $name);
            $video->video = $name;
            $video->save();
        }
        
        return redirect()->route('cerita-alumni')
            ->with('success', 'Video Berhasil Dibuat');
    }

    public function show(Video $video)
    {
        return view('pages.cerita-alumni.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('pages.cerita-alumni.edit', compact('video'));
    }

    public function update(VideoFormRequest $request, Video $video)
    {
		$video->update($request->all());
        
        //move 
		if ($request->hasFile('image')) {
			if(file_exists(\base_path() . "/public/videoimage/".$video->image) && $video->image != "")
				unlink(\base_path() . "/public/videoimage/".$video->image);	
            $resource   = $request->file('image');
            $name       = $video->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/videoimage", $name);
            $video->image = $name;
			$video->save();
        }
		if ($request->hasFile('video')) {
			if(file_exists(\base_path() . "/public/video/".$video->video) && $video->video != "")
				unlink(\base_path() . "/public/video/".$video->video);	
            $resource   = $request->file('video');
            $name       = $video->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/video", $name);
            $video->video = $name;
			$video->save();
        }
		
		return redirect()->route('cerita-alumni')
            ->with('success', 'Video Berhasil Diperbarui');
    }

    public function destroy(Video $video)
    {
		$file = $video->image;
		$file2 = $video->video;
        if($video->delete()){
			if(file_exists(\base_path() . "/public/videoimage/".$file) && $file != "")
				unlink(\base_path() . "/public/videoimage/".$file);	
			if(file_exists(\base_path() . "/public/video/".$file2) && $file2 != "")
				unlink(\base_path() . "/public/video/".$file2);	
		}
		
        return redirect()->route('cerita-alumni')
            ->with('success', 'Video Berhasil Dihapus');
    }
}
