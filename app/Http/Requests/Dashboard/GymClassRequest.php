<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GymClassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'time' => 'required_without:id,date_format:H:i',
            'image' => 'required_without:id|max:900|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string', Rule::unique('gym_class_translations', 'title')->ignore($this->id, 'gym_class_id')]];
        }

        return $rules;
    }
}
