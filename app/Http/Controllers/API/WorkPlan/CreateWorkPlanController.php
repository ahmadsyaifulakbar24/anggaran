<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkPlan\WorkPlanRequest;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\WorkPlan;

class CreateWorkPlanController extends Controller
{
    public function __invoke(WorkPlanRequest $request)
    {
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
