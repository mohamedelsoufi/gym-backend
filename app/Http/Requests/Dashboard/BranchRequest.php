<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'phone'         => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:30',
            'image' => 'required_without:id|max:900|image',
            'facebook' => ["required", "url", "unique:teams,facebook," . $this->id,],
            'instagram' => ["required", "url", "unique:teams,instagram," . $this->id,],

        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string', Rule::unique('branch_translations', 'title')->ignore($this->id, 'branch_id')]];
        }

        return $rules;
    }
}
