<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'type' => 'required|string|in:phone,email,social',
            'icon' => 'required_without:id|string|max:50',
        ];
        if (request()->type == 'email'){
            $rules += ['contact' => ['required', 'email','max:255','unique:contacts,contact,'.$this->id]];
        }else{
              $rules += ['contact' => ['required', 'string','max:255','unique:contacts,contact,'.$this->id]];
        }

        return $rules;
    }
}
