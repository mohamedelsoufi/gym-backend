<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ClassScheduleRequest;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClassScheduleController extends Controller
{
    private $schedule;

    public function __construct(ClassSchedule $schedule)
    {
        $this->middleware(['permission:read-class_schedules'])->only('index', 'show');
        $this->middleware(['permission:create-class_schedules'])->only('create', 'store');
        $this->middleware(['permission:update-class_schedules'])->only('edit', 'update');
        $this->middleware(['permission:delete-class_schedules'])->only('destroy');
        $this->schedule = $schedule;
    }

    public function index()
    {
        try {
            $schedules = $this->schedule->latest('id')->get();
            return view('admin.class_schedule.index', compact('schedules'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.class_schedule.create');
    }

    public function store(ClassScheduleRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image','cover']);
            $schedule = $this->schedule->create($requested_data);
            $schedule->uploadFile();

            return redirect()->route('schedules.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(ClassSchedule $schedule)
    {
        return view('admin.class_schedule.show', compact('schedule'));
    }

    public function edit(ClassSchedule $schedule)
    {
        return view('admin.class_schedule.edit', compact('schedule'));
    }

    public function update(ClassScheduleRequest $request, ClassSchedule $schedule)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image','cover']);
            $requested_data['updated_at'] = Carbon::now();
            $schedule->update($requested_data);

            $schedule->updateFile();

            return redirect()->route('schedules.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(ClassSchedule $schedule)
    {
        try {
            $schedule->deleteFile();
            $schedule->delete();
            return redirect()->route('schedules.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
