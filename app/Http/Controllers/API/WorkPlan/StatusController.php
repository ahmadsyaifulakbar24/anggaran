<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status(Request $request, WorkPlan $work_plan)
    {
        $this->validate($request, [
            'status' => ['required', 'in:pending,accept,decline'],
            'comment' => ['required', 'string'],
        ]);

        if($work_plan->status == $request->status) {
            return ResponseFormatter::error([
                'message' => 'the status of your request is the same as the current status'
            ], 'error update status data', 422);
        }

        $work_plan->update([ 'status' => $request->status ]);
        $work_plan->comment()->create([ 'comment' => $request->comment ]);
        $work_plan->history()->create([ 'status' => $request->status . ' work plan' ]);

        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            'success update status work plan data'
        );
    }
}
