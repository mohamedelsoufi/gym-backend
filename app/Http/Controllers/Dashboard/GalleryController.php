<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    private $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->middleware(['permission:read-galleries'])->only('index', 'show');
        $this->middleware(['permission:create-galleries'])->only('create', 'store');
        $this->middleware(['permission:update-galleries'])->only('edit', 'update');
        $this->middleware(['permission:delete-galleries'])->only('destroy');
        $this->gallery = $gallery;
    }

    public function index()
    {
        try {
            $galleries = $this->gallery->latest('id')->get();
            return view('admin.galleries.index', compact('galleries'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(GalleryRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            $gallery = $this->gallery->create($requested_data);
            $gallery->uploadFile();

            return redirect()->route('galleries.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            $requested_data['updated_at'] = Carbon::now();
            $gallery->update($requested_data);

            $gallery->updateFile();

            return redirect()->route('galleries.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->deleteFile();
            $gallery->delete();
            return redirect()->route('galleries.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
