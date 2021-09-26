<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\CodeRo;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateWorkPlanController extends Controller
{
    protected $message = 'success update work plan data';

    public function __invoke(Request $request, WorkPlan $work_plan)
    {
        $this->validate($request, [
            'program_id' => [
                'required',
                Rule::exists('programs', 'id')->where(function($query) {
                    return $query->where('program_type', 'activity');
                })
            ],
            'type_kro' => ['required', 'in:pn,non_pn'],
            'kro_id' => ['required', 'exists:kro,id'],
            'code_ro' => ['required', 'string'],
            'name_ro' => ['required', 'string'],
            'component_code' => [
                'required', 
                Rule::unique('work_plans','component_code')->ignore($work_plan->id)->where(function($query) {
                    $query->where('unit_id', Auth::user()->unit_id);
                })
            ],
            'component_name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'total_target' => ['required', 'integer'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
            'budged' => ['required', 'integer'],
            'province_id' => ['required', 'exists:provinces,id'],
            'sub_work_plan' => ['required', 'array'],
            'sub_work_plan.*.city_id' => [
                'required', 
                'distinct',
                Rule::exists('cities', 'id')->where(function($query) use ($request) {
                    return $query->where('province_id', $request->province_id);
                })
            ],
            'detail' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        
        $input = $request->all();
        $unit_id = Auth::user()->unit_id;

         // Cek Code RO
         $code_ro = CodeRo::where([['unit_id', $unit_id], ['code_ro', $request->code_ro]]);
         if($code_ro->count() > 0) {
             $get_code_ro = $code_ro->first();
         } else {
             $get_code_ro = CodeRo::create([
                 'code_ro' => $request->code_ro,
                 'ro' => $request->name_ro,
                 'unit_id' => $unit_id
             ]);
         }
         $input['ro_id'] = $get_code_ro->id;

        // Update Work Plan
        $work_plan->update($input);

        // Insert sub work plan
        foreach($request->sub_work_plan as $sub_work_plan) {
            $city_id = $sub_work_plan['city_id'];
            $cities_id[] = $city_id;
        }
        $work_plan->sub_work_plan_many()->sync($cities_id);
        
        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            $this->message
        );
    }
}
