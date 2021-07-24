<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Division;
use App\Producttype;
use App\User;
use App\Customer;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select('customers.name', 'projects.*')->leftJoin('customers', "projects.customer_id", "=", "customers.id")->orderBy('projects.created_at', 'desc')->get();
            return Datatables::of($projects)
                ->addIndexColumn()
                ->editColumn('created_at', function ($project) {
                    return $project->created_at->format('d, M Y H:i');
                })
                ->editColumn('updated_at', function ($project) {
                    return $project->updated_at->format('d, M Y H:i');
                })
                ->addColumn('action', function ($project) {
                    $action = view('pages.projects.action', compact('project'));;
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.projects.index');
    }

    public function create()
    {
		$kosong = array("" => "");
		
		$division = Division::pluck('name', 'id')->all();
		$divisions = array_merge($kosong, $division);
		
		$producttype = Producttype::pluck('name', 'id')->all();
		$producttypes = array_merge($kosong, $producttype);
		
		$customer = Customer::pluck('name', 'id')->all();
		$customers = array_merge($kosong, $customer);
		
		$user = User::pluck('name', 'id')->all();
		$users = array_merge($kosong, $user);
		
		$is_closed = [
			'0' => 'No',
			'1' => 'Yes'
		];
		
        return view('pages.projects.create', compact(['divisions', 'producttypes', 'customers', 'users', 'is_closed']));
    }

    public function store(ProjectFormRequest $request)
    {
		$project = new Project();
		$project->nama = $request->nama;
		$project->customer_id = $request->customer_id;
		$project->division_id = $request->division_id;
		$project->owner = $request->owner;
		$project->manager = $request->manager;
		if($request->date_form_pm)
			$project->date_form_pm = date('Y-m-d', strtotime($request->date_form_pm));
		$project->no_form_pm = $request->no_form_pm;
		$project->producttype_id = $request->producttype_id;
		$project->pef_date = $request->pef_date;
		if($request->start_date)
			$project->start_date = date('Y-m-d', strtotime($request->start_date));
		if($request->end_date)
			$project->end_date = date('Y-m-d', strtotime($request->end_date));
		$project->pef_no = $request->pef_no;
		$project->spk_pks = $request->spk_pks;
		$project->range_spk = $request->range_spk;
		$project->amount_exclude_ppn = $request->amount_exclude_ppn;
		$project->terms_of_payment = $request->terms_of_payment;
		$project->description = $request->description;
		$project->notes = $request->notes;
		$project->is_closed = $request->is_closed;
		$project->save();
        
        return redirect()->route('projects.index')
            ->with('success', 'Project Berhasil Dibuat');
    }

    public function show(Project $project)
    {
        return view('pages.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $divisions = Division::pluck('name', 'id')->all();
		
		$producttypes = Producttype::pluck('name', 'id')->all();
		
		$customers = Customer::pluck('name', 'id')->all();
		
		$users = User::pluck('name', 'id')->all();
		
		$is_closed = [
			'0' => 'No',
			'1' => 'Yes'
		];
		
		$date_form_pm = $start_date = $end_date = "";
		if($project->date_form_pm)
			$date_form_pm = date('d-m-Y', strtotime($project->date_form_pm));
		if($project->start_date)
			$start_date = date('d-m-Y', strtotime($project->start_date));
		if($project->end_date)
			$end_date = date('d-m-Y', strtotime($project->end_date));
		
        return view('pages.projects.edit', compact(['project', 'divisions', 'producttypes', 'customers', 'users', 'is_closed', 'date_form_pm', 'start_date', 'end_date']));
    }

    public function update(ProjectFormRequest $request, Project $project)
    {
        $project->nama = $request->nama;
		$project->customer_id = $request->customer_id;
		$project->division_id = $request->division_id;
		$project->owner = $request->owner;
		$project->manager = $request->manager;
		if($request->date_form_pm)
			$project->date_form_pm = date('Y-m-d', strtotime($request->date_form_pm));
		$project->no_form_pm = $request->no_form_pm;
		$project->producttype_id = $request->producttype_id;
		$project->pef_date = $request->pef_date;
		if($request->start_date)
			$project->start_date = date('Y-m-d', strtotime($request->start_date));
		if($request->end_date)
			$project->end_date = date('Y-m-d', strtotime($request->end_date));
		$project->pef_no = $request->pef_no;
		$project->spk_pks = $request->spk_pks;
		$project->range_spk = $request->range_spk;
		$project->amount_exclude_ppn = $request->amount_exclude_ppn;
		$project->terms_of_payment = $request->terms_of_payment;
		$project->description = $request->description;
		$project->notes = $request->notes;
		$project->is_closed = $request->is_closed;
        $project->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project Berhasil Diperbarui');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project Berhasil Dihapus');
    }
}
