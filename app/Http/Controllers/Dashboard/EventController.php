<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EventRequest;
use App\Models\Event;
use App\Models\EventSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    private $event;
    private $subscriber;

    public function __construct(Event $event, EventSubscriber $subscriber)
    {
        $this->middleware(['permission:read-events'])->only('index', 'show');
        $this->middleware(['permission:create-events'])->only('create', 'store');
        $this->middleware(['permission:update-events'])->only('edit', 'update');
        $this->middleware(['permission:delete-events'])->only('destroy');
        $this->event = $event;
        $this->subscriber = $subscriber;
    }

    public function index()
    {
        try {
            $events = $this->event->latest('id')->get();
            return view('admin.events.index', compact('events'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function subscribers()
    {
        try {
            $subscribers = $this->subscriber->latest('id')->get();
            return view('admin.events.subscribers', compact('subscribers'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            if ($request->has('from')) {
                $requested_data['from'] = date('H:i',strtotime($request->from));
            }
            if ($request->has('to')) {
                $requested_data['to'] = date('H:i',strtotime($request->to));
            }
            $event = $this->event->create($requested_data);

            return redirect()->route('events.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            $requested_data = $request->except(['_token', 'profile_avatar_remove', 'image']);
            $requested_data['updated_at'] = Carbon::now();
            if ($request->has('from')) {
                $requested_data['from'] = date('H:i',strtotime($request->from));
            }
            if ($request->has('to')) {
                $requested_data['to'] = date('H:i',strtotime($request->to));
            }
            $event->update($requested_data);

            return redirect()->route('events.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(Event $event)
    {
        try {
            $event->delete();
            return redirect()->route('events.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }

}
