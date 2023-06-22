<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchPointRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.description' => ['required', 'string', Rule::unique('branch_point_translations', 'description')->ignore($this->id, 'branch_point_id')]];
        }

        return $rules;
    }
}
