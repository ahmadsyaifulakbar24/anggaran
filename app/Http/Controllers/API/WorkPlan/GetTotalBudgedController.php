<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GetTotalBudgedController extends Controller
{
    public function totalBudget(Request $request)
    {
        $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'get_by' => ['required', 'in:program,activity,kro,ro'],
            'user_program_id' => [
                Rule::requiredIf($request->get_by == 'activity'),
                'exists:user_programs,id'
            ],
            'user_activity_id' => [
                Rule::requiredIf($request->get_by == 'kro'),
                'exists:user_activities,id'
            ],
            'user_kro_id' => [
                Rule::requiredIf($request->get_by == 'ro'),
                'exists:user_kro,id'
            ],
        ]);

        $vw_work_plan_detail = VwWorkPlanDetail::where('unit_id', $request->unit_id);
        if($request->get_by == 'activity') {
            $vw_work_plan_detail->where('id', $request->user_program_id);
        } else if($request->get_by == 'kro') {
            $vw_work_plan_detail->where('user_activity_id_w', $request->user_activity_id);
        } else if($request->get_by == 'ro') {
            $vw_work_plan_detail->where('user_kro_id_w', $request->user_kro_id);
        }

        return ResponseFormatter::success(
            ['total_budged' => $vw_work_plan_detail->sum('budged')],
            'success get total budged data'
        );

    }
}
