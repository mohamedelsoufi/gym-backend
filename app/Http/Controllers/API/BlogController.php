<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubscriberRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\EventResource;
use App\Models\Blog;
use App\Models\Event;
use App\Models\EventSubscriber;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    private $event;

    public function __construct(Blog $blog, Event $event)
    {
        $this->blog = $blog;
        $this->event = $event;
    }

    public function index()
    {
        try {
            $data['blogs'] = BlogResource::collection($this->blog->search()->active()->get());
            $data['events'] = EventResource::collection($this->event->active()->take(3)->get());
            return successResponse($data, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
