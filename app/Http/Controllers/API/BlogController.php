<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function __invoke()
    {
        try {
            $blogs = BlogResource::collection($this->blog->active()->get());
            return successResponse($blogs, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
