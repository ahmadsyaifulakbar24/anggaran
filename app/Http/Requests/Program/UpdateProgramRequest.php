<?php

namespace App\Http\Requests\Program;

use App\Models\Program;
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
        if($this->program->program_type == 'code_activity' || $this->program->program_type == 'activity') {
            $required_unit = 'required';
            $code_program_unique = [['parent_id', $this->program->parent_id], ['unit_id', $this->unit_id]];
        } else {
            $required_unit = 'nullable';
            $code_program_unique = ['parent_id', $this->program->parent_id];
        }

        return [
            'code_program' => [
                'required', 
                'string',
                Rule::unique('programs', 'code_program')->ignore($this->program->id)->where( function ($query) use ($code_program_unique) {
                    if($this->program->parent_id) {
                        return $query->where($code_program_unique);
                    } else {
                        return $query->whereNull('parent_id');
                    }
                })
            ],
            'description' => ['required', 'string'],
            'unit_id' => [$required_unit, 'exists:units,id']
        ];
    }
}
