<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurationFormRequest;
use App\Configuration;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Config;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:configuration-list|configuration-create|configuration-edit|configuration-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:configuration-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:configuration-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:configuration-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $configurations = Configuration::orderBy('name', 'asc')->get();
            return DataTables::of($configurations)
                ->addIndexColumn()
                ->addColumn('action', function ($configuration) {
                    $action = view('pages.configurations.action', compact('configuration'));
                    return $action;
                })
				->addColumn('value_es', function ($configuration) {
					if($configuration->type != 'textarea')
						return $configuration->value;
					else
						return '';
                })
                ->rawColumns(['action','value_es'])
                ->make(true);
        }
        return view('pages.configurations.index');
    }

    public function create()
    {
        return view('pages.configurations.create');
    }

    public function store(ConfigurationFormRequest $request)
    {
        $configuration = Configuration::create($request->all());
		if ($request->hasFile('image')) {
            $resource   = $request->file('image');
            $name       = 'configuration'.$configuration->id . '.' . $resource->getClientOriginalExtension();
            $resource->move(\public_path() . "/images", $name);
            $configuration->image = $name;
            $configuration->save();
        }
		return redirect()->route('configurations.index')
            ->with('success', 'configurations Berhasil Dibuat');
    }

    public function show(Configuration $configuration)
    {
        return view('pages.configurations.show', compact('configuration'));
    }

    public function edit(Configuration $configuration)
    {
        return view('pages.configurations.edit', compact('configuration'));
    }
	
	public function update(ConfigurationFormRequest $request, Configuration $configuration)
    {
        $configuration->update($request->all());
		if ($request->hasFile('value')) {
            $resource   = $request->file('value');
            $name       = $configuration->name.'.' . $resource->getClientOriginalExtension();
            $resource->move(\public_path() . "/config", $name);
            $configuration->value = $name;
            $configuration->save();
        }
		return redirect()->route('configurations.index')
            ->with('success', 'configurations Berhasil Diperbarui');
    }

    public function destroy(Configuration $configuration)
    {
		$configuration->delete();
		return redirect()->route('configurations.index')
            ->with('success', 'configurations Berhasil Dihapus');
    }
}
