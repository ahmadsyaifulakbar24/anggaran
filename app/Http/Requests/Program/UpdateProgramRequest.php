<?php

namespace App\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_program' => [
                'required', 
                'string',
                Rule::unique('programs', 'code_program')->ignore($this->program->id)->where( function ($query) {
                    if($this->parent_id) {
                        return $query->where('parent_id', $this->parent_id);
                    } else {
                        return $query->whereNull('parent_id');
                    }
                })
            ],
            'description' => ['required', 'string']
        ];
    }
}
