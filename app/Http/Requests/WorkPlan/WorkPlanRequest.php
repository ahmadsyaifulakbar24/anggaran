<?php

namespace App\Http\Requests\WorkPlan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkPlanRequest extends FormRequest
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
            'program_id' => [
                'required',
                Rule::exists('programs', 'id')->where(function($query) {
                    return $query->where('program_type', 'activity');
                })
            ],
            'title' => ['required', 'string'],
            'total_target' => ['required', 'integer'],
            'unit_target' => ['required', 'string'],
            'budged' => ['required', 'integer'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => [
                'required', 
                Rule::exists('cities', 'id')->where(function($query) {
                    return $query->where('province_id', $this->province_id);
                })
            ],
            'detail' => ['required', 'string'],
            'description' => ['required', 'string']
        ];
    }
}
