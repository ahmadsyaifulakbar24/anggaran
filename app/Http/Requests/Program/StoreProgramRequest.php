<?php

namespace App\Http\Requests\Program;

use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProgramRequest extends FormRequest
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
        if($this->parent_id) {
            $program = Program::find($this->parent_id);
            if($program) {
                if($program->program_type == 'code_program' || $program->program_type == 'code_kegiatan') {
                    $required_unit = 'required';
                    $code_program_unique = [['parent_id', $this->parent_id], ['unit_id', $this->unit_id]];
                } else {
                    $required_unit = 'nullable';
                    $code_program_unique = ['parent_id', $this->parent_id];
                }
            } else {
                return ['parent_id' => ['nullable', 'exists:programs,id']];
            }
        } else {
            $required_unit = 'nullable';
        }
        
        return [
            'parent_id' => ['nullable', 'exists:programs,id'],
            'code_program' => [
                'required', 
                'string',
                Rule::unique('programs', 'code_program')->where( function ($query) use ($code_program_unique) {
                    if($this->parent_id) {
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
