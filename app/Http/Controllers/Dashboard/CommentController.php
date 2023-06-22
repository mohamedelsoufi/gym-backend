<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->middleware(['permission:read-comments'])->only('index', 'show');
        $this->middleware(['permission:create-comments'])->only('create', 'store');
        $this->middleware(['permission:update-comments'])->only('edit', 'update');
        $this->middleware(['permission:delete-comments'])->only('destroy');
        $this->comment = $comment;
    }

    public function index()
    {
        try {
            $comments = $this->comment->latest('id')->get();
            return view('admin.comments.index', compact('comments'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }


    public function destroy(Comment $comment)
    {
        try {
            $comment->deleteFile();
            $comment->delete();
            return redirect()->route('comments.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
