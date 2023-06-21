<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DayRequest;
use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DayController extends Controller
{
    private $day;

    public function __construct(Day $day)
    {
        $this->middleware(['permission:read-days'])->only('index', 'show');
        $this->middleware(['permission:create-days'])->only('create', 'store');
        $this->middleware(['permission:update-days'])->only('edit', 'update');
        $this->middleware(['permission:delete-days'])->only('destroy');
        $this->day = $day;
    }

    public function index()
    {
        try {
            $days = $this->day->latest('id')->get();
            return view('admin.days.index', compact('days'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.days.create');
    }

    public function store(DayRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $this->day->create($requested_data);
            return redirect()->route('days.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Day $day)
    {
        return view('admin.days.show', compact('day'));
    }

    public function edit(Day $day)
    {
        return view('admin.days.edit', compact('day'));
    }

    public function update(DayRequest $request, Day $day)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token']);
            $requested_data['updated_at'] = Carbon::now();

            $day->update($requested_data);

            return redirect()->route('days.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(Day $day)
    {
        try {
            $day->delete();
            return redirect()->route('days.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
