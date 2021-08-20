<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkPlan\WorkPlanRequest;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;

class UpdateWorkPlanController extends Controller
{
    protected $message = 'success update work plan data';

    public function __invoke(WorkPlanRequest $request, WorkPlan $work_plan)
    {
        $input = $request->all();
        $work_plan->update($input);
        
        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            $this->message
        );
    }
}
