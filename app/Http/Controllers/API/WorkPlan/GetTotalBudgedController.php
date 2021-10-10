<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\SubWorkPlan;
use App\Models\VwSubWorkPlanDetail;
use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            ['total_budged' => $vw_work_plan_detail->where('admin_status', 'accept')->sum('budged')],
            'success get total budged data'
        );

    }

    public function totalBudgetByProvince(Request $request)
    {
        $request->validate([
            'province_id' => ['required', 'exists:provinces,id'],
            'unit_id' => ['nullable', 'exists:units,id'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $sub_work_plan = DB::table(DB::raw("(SELECT * FROM vw_sub_work_plan_detail GROUP BY work_plan_id) as sub_work_plan_detail"));

        if($request->unit_id) {
            $sub_work_plan->where('unit_id', $request->unit_id);
        } else if($request->user_id) {
            $sub_work_plan->where('user_id', $request->user_id);
        }
        return ResponseFormatter::success([
            'total_work_plan' => $sub_work_plan->count(),
            'total_budged' => $sub_work_plan->where('admin_status', 'accept')->sum('budged'),
        ], 'success get total budged by province');
    } 
}
