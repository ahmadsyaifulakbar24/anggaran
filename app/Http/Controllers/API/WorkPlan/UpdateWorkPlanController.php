<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\User;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateWorkPlanController extends Controller
{
    protected $message = 'success update work plan data';

    public function __invoke(Request $request, WorkPlan $work_plan)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            'user_ro_id' => ['required', 'exists:user_ro,id'],
            'component_code' => [
                'required', 
                Rule::unique('work_plans','component_code')->ignore($work_plan->id)->where(function($query) use ($user, $request) {
                    $query->where([['unit_id', $user->unit_id], ['user_ro_id', $request->user_ro_id]]);
                })
            ],
            'component_name' => ['required', 'string'],
            'total_target' => ['required', 'integer'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
            'detail' => ['required', 'string'],
            'description' => ['required', 'string'],

             // Target Indicator
            'target_indicator_status' => ['required', 'in:0,1'],
            'target_id' => [
                Rule::requiredIf($request->target_indicator_status == 1),
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'target');
                })
            ],
            'indicator_id' => [
                Rule::requiredIf($request->target_indicator_status == 1),
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'indicator');
                })
            ],

            // pph7
            'pph7_status' => ['required', 'in:0,1'],
            'pph7_id' => [
                Rule::requiredIf($request->pph7_status == 1),
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'pph7');
                })
            ],

            // Sub work plan validation
            'sub_work_plan' => ['required', 'array'],
            'sub_work_plan.*.province_id' => [ 'required', 'exists:provinces,id' ],
            'sub_work_plan.*.city_id' => [ 'required', 'distinct', 'exists:cities,id' ],

            // source funding validation
            'source_funding' => ['required', 'array'],
            'source_funding.*.param_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'sources_of_funding');
                })
            ],
            'source_funding.*.nominal' => [ 'required','int' ],
        ]);
        
        $input = $request->all();
        if($request->target_indicator_status == 0) {
            $input['target_id'] = null;
            $input['indicator_id'] = null;
        }

        if($request->pph7_status == 0) {
            $input['pph7_id'] = null;
        }  

        // Update Work Plan
        $work_plan->update($input);

        // Insert sub work plan
        foreach($request->sub_work_plan as $sub_work_plan) {
            $province_id = $sub_work_plan['province_id'];
            $city_id = $sub_work_plan['city_id'];
            $sub_work_plans[$city_id] = [
                'province_id' => $province_id
            ];
        }
        $work_plan->sub_work_plan_many()->sync($sub_work_plans);
        
        // Inser source funding 
        $budged = 0;
        foreach($request->source_funding as $key => $source_funding) {
            $param_id = $source_funding['param_id'];
            $nominal = $source_funding['nominal'];
            $source_fundings[$key] = [
                'param_id' => $param_id,
                'nominal' => $nominal
            ];
            $budged += $nominal;
        }
        $work_plan->source_funding_many()->sync($source_fundings);
        $work_plan->update(['budged' => $budged]);

        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            $this->message
        );
    }
}
