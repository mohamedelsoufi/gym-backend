<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'from' => 'required_without:id,date_format:H:i',
            'to' => 'required_without:id,date_format:H:i',
            'duration' => 'required_without:id|in:daily,weekly,monthly,yearly,date',
            'date' => 'required_if:duration,date|nullable|date',
            'image' => 'required_without:id|max:900|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string', 'max:255', Rule::unique('package_translations', 'title')->ignore($this->id, 'package_id')]];
            $rules += [$locale . '.description' => ['nullable', 'string']];
        }

        return $rules;
    }
}
