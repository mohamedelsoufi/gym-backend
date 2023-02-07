<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NewsLetterRequest;
use App\Jobs\NewsLetterJob;
use App\Models\Faq;
use App\Models\NewsLetter;
use App\Models\NewsLetterMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsLetterController extends Controller
{
    private $news_letter;
    private $message;

    public function __construct(NewsLetter $news_letter, NewsLetterMessage $message)
    {
        $this->middleware(['permission:read-news_letters'])->only('index', 'show');
        $this->middleware(['permission:show_subscribed_users-news_letters'])->only('subscribedUsers');
        $this->middleware(['permission:create-news_letters'])->only('create', 'store');
        $this->middleware(['permission:update-news_letters'])->only('edit', 'update');
        $this->middleware(['permission:delete-news_letters'])->only('destroy');
        $this->news_letter = $news_letter;
        $this->message = $message;
    }

    public function index()
    {
        try {
            $news_letters = $this->message->latest('id')->get();
            return view('admin.news_letters.index', compact('news_letters'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.news_letters.create');
    }


    public function store(NewsLetterRequest $request)
    {
        try {
            $mail_body = $request->message;

            $emails = $this->news_letter->chunk(100,function ($data) use ($mail_body){
                dispatch(new NewsLetterJob($data,$mail_body));
            });


            $this->message->create($request->all());

            return redirect()->route('news-letters.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(NewsLetterMessage $newsLetter)
    {
        return view('admin.news_letters.show', compact('newsLetter'));
    }

    public function edit(NewsLetterMessage $newsLetter)
    {
        return view('admin.news_letters.edit', compact('newsLetter'));
    }

    public function update(NewsLetterRequest $request, NewsLetterMessage $newsLetter)
    {
        try {
            $requested_data = $request->except(['_token']);
            $requested_data['updated_at'] = Carbon::now();
            $newsLetter->update($requested_data);
            return redirect()->route('news-letters.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(NewsLetterMessage $newsLetter)
    {
        try {
            $newsLetter->delete();
            return redirect()->route('news-letters.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }

    public function subscribedUsers(){
        try {
            $users = $this->news_letter->latest('id')->get();
            return view('admin.news_letters.subscribed',compact('users'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }
}
