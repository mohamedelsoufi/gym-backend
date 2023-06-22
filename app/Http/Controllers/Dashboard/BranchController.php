<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BranchController extends Controller
{
    private $branch;

    public function __construct(Branch $branch)
    {
        $this->middleware(['permission:read-branches'])->only('index', 'show');
        $this->middleware(['permission:create-branches'])->only('create', 'store');
        $this->middleware(['permission:update-branches'])->only('edit', 'update');
        $this->middleware(['permission:delete-branches'])->only('destroy');
        $this->branch = $branch;
    }

    public function index()
    {
        try {
            $branches = $this->branch->latest('id')->get();
            return view('admin.branches.index', compact('branches'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(BranchRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $this->branch->create($requested_data);

            return redirect()->route('branches.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    public function edit(branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(BranchRequest $request, branch $branch)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $requested_data['updated_at'] = Carbon::now();

            $branch->update($requested_data);

            return redirect()->route('branches.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(branch $branch)
    {
        try {
            $branch->delete();
            return redirect()->route('branches.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
