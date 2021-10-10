<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanDetailResource;
use App\Models\User;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateWorkPlanController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            'user_ro_id' => ['required', 'exists:user_ro,id'],
            'component_code' => [
                'required', 
                Rule::unique('work_plans','component_code')->where(function($query) use ($user, $request) {
                    $query->where([['unit_id', $user->unit_id], ['user_ro_id', $request->user_ro_id]]);
                })
            ],
            'component_name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'total_target' => ['required', 'integer'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
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

        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user kro data');
        }

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['unit_id'] = $user->unit_id;
        $input['deputi_status'] = 'pending';
        
        // Insert work plan
        $work_plan = WorkPlan::create($input);

        // Insert sub work plan
        $work_plan->sub_work_plan()->createMany($request->sub_work_plan);

        // Insert Source Funding
        $budged = 0;
        foreach($request->source_funding as $source_funding) {
            $budged += $source_funding['nominal'];
        }
        $work_plan->source_funding()->createMany($request->source_funding);
        $work_plan->update([ 'budged' => $budged ]);

        // Inser Work Plan Tag
        $work_plan->work_plan_tag()->createMany($request->work_plan_tag);

        // Insert History Work Plan
        $history = $work_plan->history()->create([ 'action_by' => $user->id, 'status' => 'create work plan' ]);

        // Insert notification Work Plan
        $work_plan->notification()->create([
            'history_id' => $history->id,
            'created_by' => $user->id,
            'sent_to' => $user->parent_id,
            'type' => 'work_plan',
        ]);

        return ResponseFormatter::success(
            new WorkPlanDetailResource($work_plan),
            'success create work plan data'
        );
    }
}
