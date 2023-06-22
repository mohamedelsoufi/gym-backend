<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PackageController extends Controller
{
    private $package;

    public function __construct(Package $package)
    {
        $this->middleware(['permission:read-packages'])->only('index', 'show');
        $this->middleware(['permission:create-packages'])->only('create', 'store');
        $this->middleware(['permission:update-packages'])->only('edit', 'update');
        $this->middleware(['permission:delete-packages'])->only('destroy');
        $this->package = $package;
    }

    public function index()
    {
        try {
            $packages = $this->package->latest('id')->get();
            return view('admin.packages.index', compact('packages'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(PackageRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            $package = $this->package->create($requested_data);
            $package->uploadFile();

            return redirect()->route('packages.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Package $package)
    {
        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(PackageRequest $request, Package $package)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            $requested_data['updated_at'] = Carbon::now();
            $package->update($requested_data);

            $package->updateFile();

            return redirect()->route('packages.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(Package $package)
    {
        try {
            $package->deleteFile();
            $package->delete();
            return redirect()->route('packages.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
