<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'image' => 'required_without:id|max:900|image',
            'facebook' => ["required_without:id", "url", "unique:teams,facebook," . $this->id,],
            'instagram' => ["required_without:id", "url", "unique:teams,instagram," . $this->id,],

        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string','max:255', Rule::unique('team_translations', 'name')->ignore($this->id, 'team_id')]];
            $rules += [$locale . '.job_title' => ['required', 'string']];
            $rules += [$locale . '.description' => ['nullable', 'string']];
        }

        return $rules;
    }
}
