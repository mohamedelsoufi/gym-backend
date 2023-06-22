<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'image' => 'required_without:id|max:900|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string','max:255', Rule::unique('package_translations', 'title')->ignore($this->id, 'package_id')]];
            $rules += [$locale . '.description' => ['nullable', 'string']];
        }

        return $rules;
    }
}
