<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private $contact;

    public function __construct(ContactRequest $contact)
    {
        $this->contact = $contact;
    }

    public function __invoke(\App\Http\Requests\API\ContactRequest $request)
    {
        try {
            $requested_data = $request->only(['name', 'email', 'phone', 'subject', 'message']);

            $contact = $this->contact->create($requested_data);
            Mail::to(CONTACTS_MAIL)->send(new ContactMail($contact));
            return successResponse($contact, __("message.sent_successfully"), 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);

        }
    }
}
