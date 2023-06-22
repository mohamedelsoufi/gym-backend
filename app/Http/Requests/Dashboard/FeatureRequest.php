<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeatureRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'icon' => 'nullable|string',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string','max:255', Rule::unique('feature_translations', 'title')->ignore($this->id, 'feature_id')]];
            $rules += [$locale . '.description' => ['nullable', 'string']];
        }

        return $rules;
    }
}
