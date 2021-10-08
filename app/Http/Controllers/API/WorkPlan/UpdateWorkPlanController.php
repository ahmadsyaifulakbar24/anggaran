<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\CodeRo;
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
            'title' => ['required', 'string'],
            'total_target' => ['required', 'integer'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
            'budged' => ['required', 'integer'],
            'detail' => ['required', 'string'],
            'description' => ['required', 'string'],

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

            // work plan tag validation
            'work_plan_tag' => ['required', 'array'],
            'work_plan_tag.*.param_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->whereIn('category', ['target', 'indicator']);
                })
            ],
            'work_plan_tag.*.category' => [ 'required', 'in:indicator,sources_of_funding' ]
        ]);
        
        $input = $request->all();

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
        foreach($request->source_funding as $key => $source_funding) {
            $param_id = $source_funding['param_id'];
            $nominal = $source_funding['nominal'];
            $source_fundings[$key] = [
                'param_id' => $param_id,
                'nominal' => $nominal
            ];
        }
        $work_plan->source_funding_many()->sync($source_fundings);

        // Insert work plan tag 
        foreach($request->work_plan_tag as $key => $work_plan_tag) {
            $param_id = $work_plan_tag['param_id'];
            $category = $work_plan_tag['category'];
            $work_plan_tags[$key] = [
                'param_id' => $param_id,
                'category' => $category
            ];
        }
        $work_plan->work_plan_tag_many()->sync($work_plan_tags);

        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            $this->message
        );
    }
}
