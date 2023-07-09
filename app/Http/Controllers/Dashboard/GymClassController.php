<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GymClassRequest;
use App\Models\Branch;
use App\Models\Day;
use App\Models\GymClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GymClassController extends Controller
{
    private $class;
    private $day;
    private $branch;

    public function __construct(GymClass $class, Day $day,Branch $branch)
    {
        $this->middleware(['permission:read-gym_classes'])->only('index', 'show');
        $this->middleware(['permission:create-gym_classes'])->only('create', 'store');
        $this->middleware(['permission:update-gym_classes'])->only('edit', 'update');
        $this->middleware(['permission:delete-gym_classes'])->only('destroy');
        $this->day = $day;
        $this->branch = $branch;
        $this->class = $class;
    }

    public function index()
    {
        try {
            $classes = $this->class->latest('id')->get();
            return view('admin.gym_classes.index', compact('classes'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        $all_days = $this->day->get();
        $all_branches = $this->branch->get();
        return view('admin.gym_classes.create', compact('all_days','all_branches'));
    }

    public function store(GymClassRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image', 'days','branches','time']);

            if ($request->has('time')) {
                $requested_data['time'] = date('H:i',strtotime($request->time));
            }

            $class = $this->class->create($requested_data);

            if ($request->has('days')) {
                $days = array_map(function ($value) {
                    return intval(($value));
                }, $request->days);
                $class->days()->attach($days);
            }
            if ($request->has('branches')) {
                $branches = array_map(function ($value) {
                    return intval(($value));
                }, $request->branches);
                $class->branches()->attach($branches);
            }
            $class->uploadFile();
            return redirect()->route('classes.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(GymClass $class)
    {
        return view('admin.gym_classes.show', compact('class'));
    }

    public function edit(GymClass $class)
    {
        $all_days = $this->day->get();
        $all_branches = $this->branch->get();
        $days = $class->days->pluck('id');
        $branches = $class->branches->pluck('id');
        return view('admin.gym_classes.edit', compact('class', 'days', 'all_days','all_branches','branches'));
    }

    public function update(GymClassRequest $request, GymClass $class)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image', 'deleteFile', 'days','branches','time']);
            $requested_data['updated_at'] = Carbon::now();
            if ($request->has('time')) {
                $requested_data['time'] = date('H:i',strtotime($request->time));
            }

            if ($request->has('deleteFile')) {
                $class->deleteFile();
            }
            $class->update($requested_data);

            if ($request->has('days')) {
                $days = array_map(function ($value) {
                    return intval(($value));
                }, $request->days);
                $class->days()->sync($days);
            }

            if ($request->has('branches')) {
                $branches = array_map(function ($value) {
                    return intval(($value));
                }, $request->branches);
                $class->branches()->sync($branches);
            }

            $class->updateFile();

            return redirect()->route('classes.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(GymClass $class)
    {
        try {
            $class->deleteFile();
            $class->delete();
            return redirect()->route('classes.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
