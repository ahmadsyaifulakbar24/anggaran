<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Export\ExcelWorkPlanResource;
use App\Http\Resources\WorkPlan\SubWorkPlanByProvinceResource;
use App\Http\Resources\WorkPlan\WorkPlanDetailResource;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\SubWorkPlan;
use App\Models\UserProgram;
use App\Models\VwSubWorkPlanDetail;
use App\Models\VwWorkPlanDetail;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GetWorkPlanController extends Controller
{
    protected $message = 'success get work plan data';

    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:work_plans,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'user_ro_id' => ['nullable', 'exists:user_ro,id'],
            'unit_id' => ['nullable', 'exists:units,id'],
            'search' => ['nullable', 'string'],
            'status' => ['nullable', 'in:accept,pending,decline,all'],
            'limit' => ['nullable', 'integer']
        ]);

        $limit = $request->input('limit', 15);
        if($request->id) {
            $work_plan = WorkPlan::find($request->id);
            return ResponseFormatter::success(
                new WorkPlanDetailResource($work_plan),
                $this->message
            );
        }

        $work_plan = WorkPlan::query();
        if($request->search) {
            $work_plan->where('component_name', 'like', '%'. $request->search .'%');
        }

        if($request->user_id) {
            $work_plan->where('user_id', $request->user_id);
        }

        if($request->user_ro_id) {
            $work_plan->where('user_ro_id', $request->user_ro_id);
        }

        if($request->unit_id) {
            $work_plan->where('unit_id', $request->unit_id);
        }

        $status = $request->status;
        if($status) {
            if($status == 'accept') {
                $work_plan->where('deputi_status', 'accept');
            } else if($status == 'pending') {
                $work_plan->where('deputi_status', 'pending');
            } else if($status == 'decline') {
                $work_plan->where('deputi_status', 'decline');
            }
        }
        $result = $work_plan->orderBy('updated_at', 'desc')->paginate($limit);
        
        return ResponseFormatter::success(
            WorkPlanResource::collection($result),
            $this->message
        );
    }

    public function get_by_province(Request $request) 
    {
        $request->validate([
            'province_id' => ['required', 'exists:provinces,id'],
            'unit_id' => ['nullable', 'exists:units,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $sub_work_plan = VwSubWorkPlanDetail::where('province_id', $request->province_id)->groupBy('work_plan_id');
        
        if($request->unit_id) {
            $sub_work_plan->where('unit_id', $request->unit_id);
        } else if($request->user_id) {
            $sub_work_plan->where('user_id', $request->user_id);
        }

        return SubWorkPlanByProvinceResource::collection($sub_work_plan->paginate($limit));
        
    }

    public function get_by_indicator_target(Request $request)
    {
        $request->validate([
            'target_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'target');
                })
            ],
            'indicator_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'indicator');
                })
            ],
        ]);

        $work_plan = WorkPlan::where([['target_id', $request->target_id], ['indicator_id', $request->indicator_id]])->get();
        return WorkPlanResource::collection($work_plan);
    }

    public function get_by_pph7(Request $request) 
    {
        $request->validate([
            'pph7_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'pph7');
                })
            ],
            'unit_id' => ['nullable', 'exists:units,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $work_plan = WorkPlan::where('pph7_id', $request->pph7_id);
        
        if($request->unit_id) {
            $work_plan->where('unit_id', $request->unit_id);
        } else if($request->user_id) {
            $work_plan->where('user_id', $request->user_id);
        }

        return WorkPlanResource::collection($work_plan->paginate($limit));
        
    }

    public function excel(Request $request)
    {
        $this->validate($request, [
            'unit_id' => ['required', 'exists:units,id']
        ]);

        $user_program = UserProgram::where('unit_id', $request->unit_id)->get();
        //
        return ResponseFormatter::success([
            'total_budged_user_program' => VwWorkPlanDetail::where([['unit_id', $request->unit_id], ['admin_status', 'accept']])->sum('budged'),
            'user_program' => ExcelWorkPlanResource::collection($user_program)
        ], 'success get excel data' );
    }
}
