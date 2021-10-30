<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LockUnlockController extends Controller
{
    public function lock (Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:lock_all,lock_by_id'],
            'work_plan_id' => [
                Rule::requiredIf($request->type == 'lock_by_id'),
                'exists:work_plans,id'
            ]
        ]);

        if($request->type == 'lock_by_id') {
            $work_plan = WorkPlan::find($request->work_plan_id);
            $work_plan->update(['permission' => 'lock']);
        } else {
            WorkPlan::where('permission', 'unlock')->update(['permission' => 'lock']);
        }

        return ResponseFormatter::success(
            null,
            'success lock work plan'
        );
    }

    public function unlock (Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:unlock_all,unlock_by_id'],
            'work_plan_id' => [
                Rule::requiredIf($request->type == 'unlock_by_id'),
                'exists:work_plans,id'
            ]
        ]);

        if($request->type == 'unlock_by_id') {
            $work_plan = WorkPlan::find($request->work_plan_id);
            $work_plan->update(['permission' => 'unlock']);
        } else {
            WorkPlan::where('permission', 'lock')->update(['permission' => 'unlock']);
        }

        return ResponseFormatter::success(
            null,
            'success unlock work plan'
        );
    }
}
