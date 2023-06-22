<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BranchPointRequest;
use App\Models\BranchPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BranchPointController extends Controller
{
    private $branch_point;

    public function __construct(BranchPoint $branch_point)
    {
        $this->middleware(['permission:read-branch_points'])->only('index', 'show');
        $this->middleware(['permission:create-branch_points'])->only('create', 'store');
        $this->middleware(['permission:update-branch_points'])->only('edit', 'update');
        $this->middleware(['permission:delete-branch_points'])->only('destroy');
        $this->branch_point = $branch_point;
    }

    public function index()
    {
        try {
            $branch_points = $this->branch_point->latest('id')->get();
            return view('admin.branch_points.index', compact('branch_points'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.branch_points.create');
    }

    public function store(BranchPointRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $this->branch_point->create($requested_data);

            return redirect()->route('branch-points.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(BranchPoint $branch_point)
    {
        return view('admin.branch_points.show', compact('branch_point'));
    }

    public function edit(BranchPoint $branch_point)
    {
        return view('admin.branch_points.edit', compact('branch_point'));
    }

    public function update(BranchPointRequest $request, BranchPoint $branch_point)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $requested_data['updated_at'] = Carbon::now();

            $branch_point->update($requested_data);

            return redirect()->route('branch-points.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(BranchPoint $branch_point)
    {
        try {
            $branch_point->delete();
            return redirect()->route('branch-points.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
