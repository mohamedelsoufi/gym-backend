<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubscriberRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        try {
            $events = EventResource::collection($this->event->active()->get());
            return successResponse($events, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }

    public function subscribe(SubscriberRequest $request)
    {
        try {
            $requested_data = $request->only(["name", "email", "phone"]);
            $event = $this->event->find($request->event_id);
            $event->subscribers()->create($requested_data);
            return successResponse([], __("message.joined"), 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
