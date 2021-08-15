<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFormRequest;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::latest()->get();
            return Datatables::of($blogs)
                ->addIndexColumn()
                ->addColumn('action', function ($blog) {
                    $action = view('pages.blogs.action', compact('blog'));
                    return $action;
                })
				->addColumn('title_ens', function ($blog) {
                    return strip_tags($blog->title);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.blogs.index');
    }

    public function create()
    {
        return view('pages.blogs.create');
    }

    public function store(BlogFormRequest $request)
    {
        $input = $request->all();
        
		$blog = Blog::create($input);
		
		//move 
		if ($request->hasFile('featured_image')) {
            $resource   = $request->file('featured_image');
            $name       = $blog->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/blog", $name);
            $blog->featured_image = $name;
            $blog->save();
        }
		if ($request->hasFile('file')) {
            $resource   = $request->file('file');
            $name       = $blog->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/blogfile", $name);
            $blog->file = $name;
            $blog->save();
        }
        
        return redirect()->route('blogs.index')
            ->with('success', 'blog Berhasil Dibuat');
    }

    public function show(Blog $blog)
    {
        return view('pages.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('pages.blogs.edit', compact('blog'));
    }

    public function update(BlogFormRequest $request, Blog $blog)
    {
		$blog->update($request->all());
        //move 
		if ($request->hasFile('featured_image')) {
			if(file_exists(\base_path() . "/public/blog/".$blog->featured_image) && $blog->featured_image != "")
				unlink(\base_path() . "/public/blog/".$blog->featured_image);	
            $resource   = $request->file('featured_image');
            $name       = $blog->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/blog", $name);
            $blog->featured_image = $name;
			$blog->save();
        }
		if ($request->hasFile('file')) {
			if(file_exists(\base_path() . "/public/blogfile/".$blog->file) && $blog->file != "")
				unlink(\base_path() . "/public/blogfile/".$blog->file);	
            $resource   = $request->file('file');
            $name       = $blog->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/blogfile", $name);
            $blog->file = $name;
			$blog->save();
        }
		return redirect()->route('blogs.index')
            ->with('success', 'blog Berhasil Diperbarui');
    }

    public function destroy(Blog $blog)
    {
		$file = $blog->file;
        if($blog->delete()){
			if($file != "" && file_exists(\base_path() . "/public/blogfile/".$file))
				unlink(\base_path() . "/public/blogfile/".$file);	
		}
		
        return redirect()->route('blogs.index')
            ->with('success', 'blog Berhasil Dihapus');
    }
}
