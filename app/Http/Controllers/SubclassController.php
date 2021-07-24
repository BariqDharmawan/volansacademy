<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubclassFormRequest;
use App\Subclass;
use App\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class SubclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:subclass-list|subclass-create|subclass-edit|subclass-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:subclass-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subclass-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subclass-delete', ['only' => ['destroy']]);
    }

    public function index(Clas $class, Request $request)
    {
        if ($request->ajax()) {
            $subclasses = $class->subclasses;
            return DataTables::of($subclasses)
                ->addIndexColumn()
                ->addColumn('action', function ($subclass) {
                    $class = $subclass->clas;
                    $action = view('pages.subclasses.action', compact('class', 'subclass'));;
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return redirect('/');
    }

    public function create(Clas $class)
    {
		return view('pages.subclasses.create', compact('class'));
    }

    public function store(Clas $class, SubclassFormRequest $request)
    {
		/*
		if (!$request->hasFile('banner')) {
            $request->banner = [];
        }
		if (!$request->hasFile('detail_info_program')) {
            $request->detail_info_program = [];
        }
		if (!$request->hasFile('detail_biaya_program')) {
            $request->detail_biaya_program = [];
        }
		if (!$request->hasFile('garansi_program')) {
            $request->garansi_program = [];
        }
		if (!$request->hasFile('gambar_profesi_1')) {
            $request->gambar_profesi_1 = [];
        }
		*/
		
		/*
		$validator = Validator::make($request->all(), [
			'banner' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			'detail_info_program' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			'detail_biaya_program' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			'garansi_program' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			'gambar_profesi_1' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'gambar_profesi_2' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_konfirmasi' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'fasilitas_program' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'fasilitas_bimbel' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'lokasi_belajar' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_alumni' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'video_alumni_testi_1' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'video_alumni_testi_2' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_tagline' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_slider_foto_alumni' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'gambar_aktifitas_belajar' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_slider_chat_alumni' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
			//'banner_closing' => ['nullable', 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:512'],
		])->validate();
		*/
		
		$input = $request->all();
        
		$subclass = Subclass::create($input  + ['class_id' => $class->id]);
		
		//move 
		if ($request->hasFile('icon')) {
            $resource   = $request->file('icon');
            $name       = 'icon' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->icon = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner')) {
            $resource   = $request->file('banner');
            $name       = 'banner' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner = $name;
            $subclass->save();
        }
		if ($request->hasFile('detail_info_program')) {
            $resource   = $request->file('detail_info_program');
            $name       = 'detail_info_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->detail_info_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('detail_biaya_program')) {
            $resource   = $request->file('detail_biaya_program');
            $name       = 'detail_biaya_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->detail_biaya_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('garansi_program')) {
            $resource   = $request->file('garansi_program');
            $name       = 'garansi_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->garansi_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('gambar_profesi_1')) {
            $resource   = $request->file('gambar_profesi_1');
            $name       = 'gambar_profesi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_profesi_1 = $name;
            $subclass->save();
        }
		if ($request->hasFile('gambar_profesi_2')) {
            $resource   = $request->file('gambar_profesi_2');
            $name       = 'gambar_profesi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_profesi_2 = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_konfirmasi')) {
            $resource   = $request->file('banner_konfirmasi');
            $name       = 'banner_konfirmasi' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_konfirmasi = $name;
            $subclass->save();
        }
		if ($request->hasFile('fasilitas_program')) {
            $resource   = $request->file('fasilitas_program');
            $name       = 'fasilitas_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->fasilitas_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('fasilitas_bimbel')) {
            $resource   = $request->file('fasilitas_bimbel');
            $name       = 'fasilitas_bimbel' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->fasilitas_bimbel = $name;
            $subclass->save();
        }
		if ($request->hasFile('lokasi_belajar')) {
            $resource   = $request->file('lokasi_belajar');
            $name       = 'lokasi_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->lokasi_belajar = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_alumni')) {
            $resource   = $request->file('banner_alumni');
            $name       = 'banner_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('thumbnail_video_alumni_testi_1')) {
            $resource   = $request->file('thumbnail_video_alumni_testi_1');
            $name       = 'thumbnail_video_alumni_testi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->thumbnail_video_alumni_testi_1 = $name;
            $subclass->save();
        }
		if ($request->hasFile('thumbnail_video_alumni_testi_2')) {
            $resource   = $request->file('thumbnail_video_alumni_testi_2');
            $name       = 'thumbnail_video_alumni_testi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->thumbnail_video_alumni_testi_2 = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_tagline')) {
            $resource   = $request->file('banner_tagline');
            $name       = 'banner_tagline' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_tagline = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_slider_foto_alumni')) {
            $resource   = $request->file('banner_slider_foto_alumni');
            $name       = 'banner_slider_foto_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_slider_foto_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('gambar_aktifitas_belajar')) {
            $resource   = $request->file('gambar_aktifitas_belajar');
            $name       = 'gambar_aktifitas_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_aktifitas_belajar = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_slider_chat_alumni')) {
            $resource   = $request->file('banner_slider_chat_alumni');
            $name       = 'banner_slider_chat_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_slider_chat_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('banner_closing')) {
            $resource   = $request->file('banner_closing');
            $name       = 'banner_closing' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_closing = $name;
            $subclass->save();
        }
		
		//mobile
		if ($request->hasFile('m_banner')) {
            $resource   = $request->file('m_banner');
            $name       = 'm_banner' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_detail_info_program')) {
            $resource   = $request->file('m_detail_info_program');
            $name       = 'm_detail_info_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_detail_info_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_detail_biaya_program')) {
            $resource   = $request->file('m_detail_biaya_program');
            $name       = 'm_detail_biaya_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_detail_biaya_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_garansi_program')) {
            $resource   = $request->file('m_garansi_program');
            $name       = 'm_garansi_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_garansi_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_gambar_profesi_1')) {
            $resource   = $request->file('m_gambar_profesi_1');
            $name       = 'm_gambar_profesi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_profesi_1 = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_gambar_profesi_2')) {
            $resource   = $request->file('m_gambar_profesi_2');
            $name       = 'm_gambar_profesi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_profesi_2 = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_konfirmasi')) {
            $resource   = $request->file('m_banner_konfirmasi');
            $name       = 'm_banner_konfirmasi' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_konfirmasi = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_fasilitas_program')) {
            $resource   = $request->file('m_fasilitas_program');
            $name       = 'm_fasilitas_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_fasilitas_program = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_fasilitas_bimbel')) {
            $resource   = $request->file('m_fasilitas_bimbel');
            $name       = 'm_fasilitas_bimbel' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_fasilitas_bimbel = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_lokasi_belajar')) {
            $resource   = $request->file('m_lokasi_belajar');
            $name       = 'm_lokasi_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_lokasi_belajar = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_alumni')) {
            $resource   = $request->file('m_banner_alumni');
            $name       = 'm_banner_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_thumbnail_video_alumni_testi_1')) {
            $resource   = $request->file('m_thumbnail_video_alumni_testi_1');
            $name       = 'm_thumbnail_video_alumni_testi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_thumbnail_video_alumni_testi_1 = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_thumbnail_video_alumni_testi_2')) {
            $resource   = $request->file('m_thumbnail_video_alumni_testi_2');
            $name       = 'm_thumbnail_video_alumni_testi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_thumbnail_video_alumni_testi_2 = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_tagline')) {
            $resource   = $request->file('m_banner_tagline');
            $name       = 'm_banner_tagline' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_tagline = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_slider_foto_alumni')) {
            $resource   = $request->file('m_banner_slider_foto_alumni');
            $name       = 'm_banner_slider_foto_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_slider_foto_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_gambar_aktifitas_belajar')) {
            $resource   = $request->file('m_gambar_aktifitas_belajar');
            $name       = 'm_gambar_aktifitas_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_aktifitas_belajar = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_slider_chat_alumni')) {
            $resource   = $request->file('m_banner_slider_chat_alumni');
            $name       = 'm_banner_slider_chat_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_slider_chat_alumni = $name;
            $subclass->save();
        }
		if ($request->hasFile('m_banner_closing')) {
            $resource   = $request->file('m_banner_closing');
            $name       = 'm_banner_closing' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_closing = $name;
            $subclass->save();
        }
        
        return redirect()->route('classes.show', $class->id)
            ->with('success', 'Sub Program Berhasil Dibuat');
    }

    public function show(Clas $class, Subclass $subclass)
    {
        return view('pages.subclasses.show', compact('class', 'subclass'));
    }
	
	public function photo(Subclass $subclass)
    {
        return view('pages.subclasses.photo', compact('subclass'));
    }
	
	public function chat(Subclass $subclass)
    {
        return view('pages.subclasses.chat', compact('subclass'));
    }

    public function edit(Clas $class, Subclass $subclass)
    {
        return view('pages.subclasses.edit', compact('class', 'subclass'));
    }

    public function update(Clas $class, SubclassFormRequest $request, Subclass $subclass)
    {
		$subclass->update($request->all());
		
		$subclass->inactive = $request->has('inactive');
        $subclass->save();
        $old = array();
        //move 
		if ($request->hasFile('icon')) {
            $resource   = $request->file('icon');
            $name       = 'icon' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->icon = $name;
            $subclass->save();
        }
		if($request->has('remove_banner')){
			$old['banner'] = $subclass->banner;
			$subclass->banner = '';
		}
		elseif ($request->hasFile('banner')) {
            $resource   = $request->file('banner');
            $name       = 'banner' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner = $name;
            $subclass->save();
        }
		
		if($request->has('remove_detail_info_program')){
			$old['detail_info_program'] = $subclass->detail_info_program;
			$subclass->detail_info_program = '';
		}
		elseif ($request->hasFile('detail_info_program')) {
            $resource   = $request->file('detail_info_program');
            $name       = 'detail_info_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->detail_info_program = $name;
            $subclass->save();
        }
		if($request->has('remove_detail_biaya_program')){
			$old['detail_biaya_program'] = $subclass->detail_biaya_program;
			$subclass->detail_biaya_program = '';
		}
		elseif ($request->hasFile('detail_biaya_program')) {
            $resource   = $request->file('detail_biaya_program');
            $name       = 'detail_biaya_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->detail_biaya_program = $name;
            $subclass->save();
        }
		if($request->has('remove_garansi_program')){
			$old['garansi_program'] = $subclass->garansi_program;
			$subclass->garansi_program = '';
		}
		elseif ($request->hasFile('garansi_program')) {
            $resource   = $request->file('garansi_program');
            $name       = 'garansi_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->garansi_program = $name;
            $subclass->save();
        }
		if($request->has('remove_gambar_profesi_1')){
			$old['gambar_profesi_1'] = $subclass->gambar_profesi_1;
			$subclass->gambar_profesi_1 = '';
		}
		elseif ($request->hasFile('gambar_profesi_1')) {
            $resource   = $request->file('gambar_profesi_1');
            $name       = 'gambar_profesi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_profesi_1 = $name;
            $subclass->save();
        }
		
		if($request->has('remove_gambar_profesi_2')){
			$old['gambar_profesi_2'] = $subclass->gambar_profesi_2;
			$subclass->gambar_profesi_2 = '';
		}
		elseif ($request->hasFile('gambar_profesi_2')) {
            $resource   = $request->file('gambar_profesi_2');
            $name       = 'gambar_profesi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_profesi_2 = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_konfirmasi')){
			$old['banner_konfirmasi'] = $subclass->banner_konfirmasi;
			$subclass->banner_konfirmasi = '';
		}
		elseif ($request->hasFile('banner_konfirmasi')) {
            $resource   = $request->file('banner_konfirmasi');
            $name       = 'banner_konfirmasi' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_konfirmasi = $name;
            $subclass->save();
        }
		if($request->has('remove_fasilitas_program')){
			$old['fasilitas_program'] = $subclass->fasilitas_program;
			$subclass->fasilitas_program = '';
		}
		elseif ($request->hasFile('fasilitas_program')) {
            $resource   = $request->file('fasilitas_program');
            $name       = 'fasilitas_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->fasilitas_program = $name;
            $subclass->save();
        }
		if($request->has('remove_fasilitas_bimbel')){
			$old['fasilitas_bimbel'] = $subclass->fasilitas_bimbel;
			$subclass->fasilitas_bimbel = '';
		}
		elseif ($request->hasFile('fasilitas_bimbel')) {
            $resource   = $request->file('fasilitas_bimbel');
            $name       = 'fasilitas_bimbel' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->fasilitas_bimbel = $name;
            $subclass->save();
        }
		if($request->has('remove_lokasi_belajar')){
			$old['lokasi_belajar'] = $subclass->lokasi_belajar;
			$subclass->lokasi_belajar = '';
		}
		elseif ($request->hasFile('lokasi_belajar')) {
            $resource   = $request->file('lokasi_belajar');
            $name       = 'lokasi_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->lokasi_belajar = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_alumni')){
			$old['banner_alumni'] = $subclass->banner_alumni;
			$subclass->banner_alumni = '';
		}
		elseif ($request->hasFile('banner_alumni')) {
            $resource   = $request->file('banner_alumni');
            $name       = 'banner_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_thumbnail_video_alumni_testi_1')){
			$old['thumbnail_video_alumni_testi_1'] = $subclass->thumbnail_video_alumni_testi_1;
			$subclass->thumbnail_video_alumni_testi_1 = '';
		}
		elseif ($request->hasFile('thumbnail_video_alumni_testi_1')) {
            $resource   = $request->file('thumbnail_video_alumni_testi_1');
            $name       = 'thumbnail_video_alumni_testi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->thumbnail_video_alumni_testi_1 = $name;
            $subclass->save();
        }
		if($request->has('remove_thumbnail_video_alumni_testi_2')){
			$old['thumbnail_video_alumni_testi_2'] = $subclass->thumbnail_video_alumni_testi_2;
			$subclass->thumbnail_video_alumni_testi_2 = '';
		}
		elseif ($request->hasFile('thumbnail_video_alumni_testi_2')) {
            $resource   = $request->file('thumbnail_video_alumni_testi_2');
            $name       = 'thumbnail_video_alumni_testi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->thumbnail_video_alumni_testi_2 = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_tagline')){
			$old['banner_tagline'] = $subclass->banner_tagline;
			$subclass->banner_tagline = '';
		}
		elseif ($request->hasFile('banner_tagline')) {
            $resource   = $request->file('banner_tagline');
            $name       = 'banner_tagline' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_tagline = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_slider_foto_alumni')){
			$old['banner_slider_foto_alumni'] = $subclass->banner_slider_foto_alumni;
			$subclass->banner_slider_foto_alumni = '';
		}
		elseif ($request->hasFile('banner_slider_foto_alumni')) {
            $resource   = $request->file('banner_slider_foto_alumni');
            $name       = 'banner_slider_foto_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_slider_foto_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_gambar_aktifitas_belajar')){
			$old['gambar_aktifitas_belajar'] = $subclass->gambar_aktifitas_belajar;
			$subclass->gambar_aktifitas_belajar = '';
		}
		elseif ($request->hasFile('gambar_aktifitas_belajar')) {
            $resource   = $request->file('gambar_aktifitas_belajar');
            $name       = 'gambar_aktifitas_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->gambar_aktifitas_belajar = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_slider_chat_alumni')){
			$old['banner_slider_chat_alumni'] = $subclass->banner_slider_chat_alumni;
			$subclass->banner_slider_chat_alumni = '';
		}
		elseif ($request->hasFile('banner_slider_chat_alumni')) {
            $resource   = $request->file('banner_slider_chat_alumni');
            $name       = 'banner_slider_chat_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_slider_chat_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_banner_closing')){
			$old['banner_closing'] = $subclass->banner_closing;
			$subclass->banner_closing = '';
		}
		elseif ($request->hasFile('banner_closing')) {
            $resource   = $request->file('banner_closing');
            $name       = 'banner_closing' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->banner_closing = $name;
            $subclass->save();
        }
		
		//mobile
		if($request->has('remove_m_banner')){
			$old['m_banner'] = $subclass->m_banner;
			$subclass->m_banner = '';
		}
		elseif ($request->hasFile('m_banner')) {
            $resource   = $request->file('m_banner');
            $name       = 'm_banner' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner = $name;
            $subclass->save();
        }
		
		if($request->has('remove_m_detail_info_program')){
			$old['m_detail_info_program'] = $subclass->m_detail_info_program;
			$subclass->m_detail_info_program = '';
		}
		elseif ($request->hasFile('m_detail_info_program')) {
            $resource   = $request->file('m_detail_info_program');
            $name       = 'm_detail_info_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_detail_info_program = $name;
            $subclass->save();
        }
		if($request->has('remove_m_detail_biaya_program')){
			$old['m_detail_biaya_program'] = $subclass->m_detail_biaya_program;
			$subclass->m_detail_biaya_program = '';
		}
		elseif ($request->hasFile('m_detail_biaya_program')) {
            $resource   = $request->file('m_detail_biaya_program');
            $name       = 'm_detail_biaya_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_detail_biaya_program = $name;
            $subclass->save();
        }
		if($request->has('remove_m_garansi_program')){
			$old['m_garansi_program'] = $subclass->m_garansi_program;
			$subclass->m_garansi_program = '';
		}
		elseif ($request->hasFile('m_garansi_program')) {
            $resource   = $request->file('m_garansi_program');
            $name       = 'm_garansi_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_garansi_program = $name;
            $subclass->save();
        }
		if($request->has('remove_m_gambar_profesi_1')){
			$old['m_gambar_profesi_1'] = $subclass->m_gambar_profesi_1;
			$subclass->m_gambar_profesi_1 = '';
		}
		elseif ($request->hasFile('m_gambar_profesi_1')) {
            $resource   = $request->file('m_gambar_profesi_1');
            $name       = 'm_gambar_profesi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_profesi_1 = $name;
            $subclass->save();
        }
		
		if($request->has('remove_m_gambar_profesi_2')){
			$old['m_gambar_profesi_2'] = $subclass->m_gambar_profesi_2;
			$subclass->m_gambar_profesi_2 = '';
		}
		elseif ($request->hasFile('m_gambar_profesi_2')) {
            $resource   = $request->file('m_gambar_profesi_2');
            $name       = 'm_gambar_profesi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_profesi_2 = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_konfirmasi')){
			$old['m_banner_konfirmasi'] = $subclass->m_banner_konfirmasi;
			$subclass->m_banner_konfirmasi = '';
		}
		elseif ($request->hasFile('m_banner_konfirmasi')) {
            $resource   = $request->file('m_banner_konfirmasi');
            $name       = 'm_banner_konfirmasi' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_konfirmasi = $name;
            $subclass->save();
        }
		if($request->has('remove_m_fasilitas_program')){
			$old['m_fasilitas_program'] = $subclass->m_fasilitas_program;
			$subclass->m_fasilitas_program = '';
		}
		elseif ($request->hasFile('m_fasilitas_program')) {
            $resource   = $request->file('m_fasilitas_program');
            $name       = 'm_fasilitas_program' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_fasilitas_program = $name;
            $subclass->save();
        }
		if($request->has('remove_m_fasilitas_bimbel')){
			$old['m_fasilitas_bimbel'] = $subclass->m_fasilitas_bimbel;
			$subclass->m_fasilitas_bimbel = '';
		}
		elseif ($request->hasFile('m_fasilitas_bimbel')) {
            $resource   = $request->file('m_fasilitas_bimbel');
            $name       = 'm_fasilitas_bimbel' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_fasilitas_bimbel = $name;
            $subclass->save();
        }
		if($request->has('remove_m_lokasi_belajar')){
			$old['m_lokasi_belajar'] = $subclass->m_lokasi_belajar;
			$subclass->m_lokasi_belajar = '';
		}
		elseif ($request->hasFile('m_lokasi_belajar')) {
            $resource   = $request->file('m_lokasi_belajar');
            $name       = 'm_lokasi_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_lokasi_belajar = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_alumni')){
			$old['m_banner_alumni'] = $subclass->m_banner_alumni;
			$subclass->m_banner_alumni = '';
		}
		elseif ($request->hasFile('m_banner_alumni')) {
            $resource   = $request->file('m_banner_alumni');
            $name       = 'm_banner_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_m_thumbnail_video_alumni_testi_1')){
			$old['m_thumbnail_video_alumni_testi_1'] = $subclass->m_thumbnail_video_alumni_testi_1;
			$subclass->m_thumbnail_video_alumni_testi_1 = '';
		}
		elseif ($request->hasFile('m_thumbnail_video_alumni_testi_1')) {
            $resource   = $request->file('m_thumbnail_video_alumni_testi_1');
            $name       = 'm_thumbnail_video_alumni_testi_1' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_thumbnail_video_alumni_testi_1 = $name;
            $subclass->save();
        }
		if($request->has('remove_m_thumbnail_video_alumni_testi_2')){
			$old['m_thumbnail_video_alumni_testi_2'] = $subclass->m_thumbnail_video_alumni_testi_2;
			$subclass->m_thumbnail_video_alumni_testi_2 = '';
		}
		elseif ($request->hasFile('m_thumbnail_video_alumni_testi_2')) {
            $resource   = $request->file('m_thumbnail_video_alumni_testi_2');
            $name       = 'm_thumbnail_video_alumni_testi_2' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_thumbnail_video_alumni_testi_2 = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_tagline')){
			$old['m_banner_tagline'] = $subclass->m_banner_tagline;
			$subclass->m_banner_tagline = '';
		}
		elseif ($request->hasFile('m_banner_tagline')) {
            $resource   = $request->file('m_banner_tagline');
            $name       = 'm_banner_tagline' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_tagline = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_slider_foto_alumni')){
			$old['m_banner_slider_foto_alumni'] = $subclass->m_banner_slider_foto_alumni;
			$subclass->m_banner_slider_foto_alumni = '';
		}
		elseif ($request->hasFile('m_banner_slider_foto_alumni')) {
            $resource   = $request->file('m_banner_slider_foto_alumni');
            $name       = 'm_banner_slider_foto_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_slider_foto_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_m_gambar_aktifitas_belajar')){
			$old['m_gambar_aktifitas_belajar'] = $subclass->m_gambar_aktifitas_belajar;
			$subclass->m_gambar_aktifitas_belajar = '';
		}
		elseif ($request->hasFile('m_gambar_aktifitas_belajar')) {
            $resource   = $request->file('m_gambar_aktifitas_belajar');
            $name       = 'm_gambar_aktifitas_belajar' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_gambar_aktifitas_belajar = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_slider_chat_alumni')){
			$old['m_banner_slider_chat_alumni'] = $subclass->m_banner_slider_chat_alumni;
			$subclass->m_banner_slider_chat_alumni = '';
		}
		elseif ($request->hasFile('m_banner_slider_chat_alumni')) {
            $resource   = $request->file('m_banner_slider_chat_alumni');
            $name       = 'm_banner_slider_chat_alumni' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_slider_chat_alumni = $name;
            $subclass->save();
        }
		if($request->has('remove_m_banner_closing')){
			$old['banner_closing'] = $subclass->m_banner_closing;
			$subclass->m_banner_closing = '';
		}
		elseif ($request->hasFile('m_banner_closing')) {
            $resource   = $request->file('m_banner_closing');
            $name       = 'm_banner_closing' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclass/".$subclass->id."", $name);
            $subclass->m_banner_closing = $name;
            $subclass->save();
        }
		
		if($subclass->save()){
			if ($request->has('remove_banner') && $old['banner']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner']);
			}
			if ($request->has('remove_m_banner') && $old['m_banner']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner']);
			}
			if ($request->has('remove_detail_info_program') && $old['detail_info_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['detail_info_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['detail_info_program']);
			}
			if ($request->has('remove_m_detail_info_program') && $old['m_detail_info_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_detail_info_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_detail_info_program']);
			}
			if ($request->has('remove_detail_biaya_program') && $old['detail_biaya_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['detail_biaya_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['detail_biaya_program']);
			}
			if ($request->has('remove_m_detail_biaya_program') && $old['m_detail_biaya_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_detail_biaya_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_detail_biaya_program']);
			}
			if ($request->has('remove_garansi_program') && $old['garansi_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['garansi_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['garansi_program']);
			}
			if ($request->has('remove_m_garansi_program') && $old['m_garansi_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_garansi_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_garansi_program']);
			}
			if ($request->has('remove_gambar_profesi_1') && $old['gambar_profesi_1']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_profesi_1']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_profesi_1']);
			}
			if ($request->has('remove_m_gambar_profesi_1') && $old['m_gambar_profesi_1']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_profesi_1']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_profesi_1']);
			}
			if ($request->has('remove_gambar_profesi_2') && $old['gambar_profesi_2']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_profesi_2']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_profesi_2']);
			}
			if ($request->has('remove_m_gambar_profesi_2') && $old['m_gambar_profesi_2']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_profesi_2']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_profesi_2']);
			}
			if ($request->has('remove_banner_konfirmasi') && $old['banner_konfirmasi']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_konfirmasi']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_konfirmasi']);
			}
			if ($request->has('remove_m_banner_konfirmasi') && $old['m_banner_konfirmasi']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_konfirmasi']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_konfirmasi']);
			}
			if ($request->has('remove_fasilitas_program') && $old['fasilitas_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['fasilitas_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['fasilitas_program']);
			}
			if ($request->has('remove_m_fasilitas_program') && $old['m_fasilitas_program']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_fasilitas_program']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_fasilitas_program']);
			}
			if ($request->has('remove_fasilitas_bimbel') && $old['fasilitas_bimbel']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['fasilitas_bimbel']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['fasilitas_bimbel']);
			}
			if ($request->has('remove_m_fasilitas_bimbel') && $old['m_fasilitas_bimbel']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_fasilitas_bimbel']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_fasilitas_bimbel']);
			}
			if ($request->has('remove_lokasi_belajar') && $old['lokasi_belajar']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['lokasi_belajar']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['lokasi_belajar']);
			}
			if ($request->has('remove_m_lokasi_belajar') && $old['m_lokasi_belajar']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_lokasi_belajar']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_lokasi_belajar']);
			}
			if ($request->has('remove_banner_alumni') && $old['banner_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_alumni']);
			}
			if ($request->has('remove_m_banner_alumni') && $old['m_banner_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_alumni']);
			}
			if ($request->has('remove_thumbnail_video_alumni_testi_1') && $old['thumbnail_video_alumni_testi_1']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['thumbnail_video_alumni_testi_1']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['thumbnail_video_alumni_testi_1']);
			}
			if ($request->has('remove_m_thumbnail_video_alumni_testi_1') && $old['m_thumbnail_video_alumni_testi_1']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_thumbnail_video_alumni_testi_1']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_thumbnail_video_alumni_testi_1']);
			}
			if ($request->has('remove_thumbnail_video_alumni_testi_2') && $old['thumbnail_video_alumni_testi_2']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['thumbnail_video_alumni_testi_2']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['thumbnail_video_alumni_testi_2']);
			}
			if ($request->has('remove_m_thumbnail_video_alumni_testi_2') && $old['m_thumbnail_video_alumni_testi_2']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_thumbnail_video_alumni_testi_2']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_thumbnail_video_alumni_testi_2']);
			}
			if ($request->has('remove_banner_slider_foto_alumni') && $old['banner_slider_foto_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_slider_foto_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_slider_foto_alumni']);
			}
			if ($request->has('remove_m_banner_slider_foto_alumni') && $old['m_banner_slider_foto_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_slider_foto_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_slider_foto_alumni']);
			}
			if ($request->has('remove_gambar_aktifitas_belajar') && $old['gambar_aktifitas_belajar']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_aktifitas_belajar']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['gambar_aktifitas_belajar']);
			}
			if ($request->has('remove_m_gambar_aktifitas_belajar') && $old['m_gambar_aktifitas_belajar']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_aktifitas_belajar']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_gambar_aktifitas_belajar']);
			}
			if ($request->has('remove_banner_slider_chat_alumni') && $old['banner_slider_chat_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_slider_chat_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_slider_chat_alumni']);
			}
			if ($request->has('remove_m_banner_slider_chat_alumni') && $old['m_banner_slider_chat_alumni']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_slider_chat_alumni']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_slider_chat_alumni']);
			}
			if ($request->has('remove_banner_closing') && $old['banner_closing']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_closing']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['banner_closing']);
			}
			if ($request->has('remove_m_banner_closing') && $old['m_banner_closing']) {
				if(file_exists(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_closing']))
					unlink(\base_path() . "/public/subclass/".$subclass->id."/".$old['m_banner_closing']);
			}
		}
		
		return redirect()->route('classes.show', $class->id)
            ->with('success', 'Sub Program Berhasil Diperbarui');
    }

    public function destroy(Clas $class, Subclass $subclass)
    {
		$file = $subclass->icon;
        if($subclass->delete()){
			if(file_exists(\base_path() . "/public/subclass/".$file))
				unlink(\base_path() . "/public/subclass/".$file);	
		}
		
        return redirect()->route('classes.show', $class->id)
            ->with('success', 'Sub Program Berhasil Dihapus');
    }
}
