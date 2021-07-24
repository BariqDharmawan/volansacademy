<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueFormRequest;
use App\Issue;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:issue-list|issue-create|issue-edit|issue-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:issue-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:issue-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:issue-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $issues = Issue::latest()->get();
            return Datatables::of($issues)
                ->addIndexColumn()
                ->addColumn('action', function ($issue) {
                    $action = view('pages.issues.action', compact('issue'));
                    return $action;
                })
				->addColumn('nama', function ($issue) {
                    return $issue->project->nama;
                })
				->addColumn('tanggal', function ($issue) {
                    return date('d-m-Y', strtotime($issue->date));
                })
                ->rawColumns(['action', 'nama'])
                ->make(true);
        }
        return view('pages.issues.index');
    }

    public function create()
    {
		$projects = Project::pluck('nama', 'id')->all();
        return view('pages.issues.create', compact('projects'));
    }

    public function store(IssueFormRequest $request)
    {
		$issue = new Issue();
		$issue->issue = $request->issue;
		$issue->date = date('Y-m-d', strtotime($request->date));
		$issue->project_id = $request->project_id;
		$issue->save();
		if ($request->hasFile('attachment')) {
			$files = $request->file('attachment');
			foreach ($files as $file) {
				$file->storeAs("/public/issue/".$issue->id."", $file->getClientOriginalName());
			}
        }
        return redirect()->route('issues.index')
            ->with('success', 'Issue/Follow Up Berhasil Dibuat');
    }

    public function show(Issue $issue)
    {
        return view('pages.issues.show', compact('issue'));
    }

    public function edit(Issue $issue)
    {
		$projects = Project::pluck('nama', 'id')->all();
		return view('pages.issues.edit', compact('issue', 'projects'));
    }

    public function update(IssueFormRequest $request, Issue $issue)
    {
        $issue->issue = $request->issue;
		$issue->date = date('Y-m-d', strtotime($request->date));
		$issue->project_id = $request->project_id;
		$issue->save();
		if ($request->hasFile('attachment')) {
			$files = $request->file('attachment');
			foreach ($files as $file) {
				$file->storeAs("/public/issue/".$issue->id."", $file->getClientOriginalName());
			}
        }
		return redirect()->route('issues.index')
            ->with('success', 'Issue/Follow Up Berhasil Diperbarui');
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
		$files = glob(storage_path('app/public/issue/'.$issue->id.'/*'));  
   
		// Deleting all the files in the list 
		foreach($files as $file) { 
			if(is_file($file))  
				// Delete the given file 
				unlink($file);  
		} 
        return redirect()->route('issues.index')
            ->with('success', 'Issue/Follow Up Berhasil Dihapus');
    }
}
