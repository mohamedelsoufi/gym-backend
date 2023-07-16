<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ContactRequestRequest;
use App\Mail\ContactReplyMail;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactRequestController extends Controller
{
    private $contact;

    public function __construct(ContactRequest $contact)
    {
        $this->middleware(['permission:read-contact_requests'])->only('index', 'show');
        $this->middleware(['permission:reply-contact_requests'])->only('reply', 'send');
        $this->middleware(['permission:delete-contact_requests'])->only('destroy');
        $this->contact = $contact;
    }

    public function index()
    {
        try {
            $contacts = $this->contact->latest('id')->get();
            return view('admin.contact_requests.index', compact('contacts'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(ContactRequest $contact)
    {
        $contact = $contact->first();
        return view('admin.contact_requests.show', compact('contact'));
    }


    public function reply($id)
    {
        try {
            $contact = $this->contact->find($id);
            return view('admin.contact_requests.reply', compact('contact'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function send(ContactRequestRequest $request)
    {
        try {
            $contact = $this->contact->find($request->id);
            $request_data = $request->only(['subject', 'message']);
            Mail::to($contact->email)->send(new ContactReplyMail($request_data));

            return redirect()->route('contact-requests.index')->with(['success' => __('message.sent_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(ContactRequest $contact)
    {
        try {
            $contact->first()->delete();
            return redirect()->route('contact-requests.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }
}
