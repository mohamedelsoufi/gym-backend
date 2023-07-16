<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|string|min:2|max:100",
            "email" => "required|email|max:200",
            "subject" => "required|min:2|max:150",
            "phone" => [
                "required",
                "string",
                "regex:/^([0-9\s\-\+\(\)]*)$/",
                "min:6",
                "max:30",
            ],
            "message" => "required|string|max:500"
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
