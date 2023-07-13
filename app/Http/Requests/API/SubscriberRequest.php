<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SubscriberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "event_id" => "required|exists:events,id",
            "name" => "required|max:100|min:2",
            "email" => "required|email|unique:event_subscribers,email",
            "phone" => "required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:30",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = failureResponse(
            $validator->errors(),
            trans("message.something_wrong"),
            400
        );

        throw new ValidationException($validator, $response);
    }
}
