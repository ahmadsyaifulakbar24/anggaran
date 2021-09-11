<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkPlan\WorkPlanRequest;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateWorkPlanController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
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
        ]);

        $input = $request->all();
        $input['status'] = 'pending';

        $work_plan = WorkPlan::create($input);
        
        $work_plan->history()->create([ 'status' => 'create work plan' ]);

        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            'success create work plan data'
        );
    }
}
