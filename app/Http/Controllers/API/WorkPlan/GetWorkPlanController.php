<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;

class GetWorkPlanController extends Controller
{
    protected $message = 'success get work plan data';

    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:work_plans,id'],
            'limit' => ['nullable', 'integer']
        ]);

        $limit = $request->input('limit', 15);
        if($request->id) {
            $work_plan = WorkPlan::find($request->id);
            return ResponseFormatter::success(
                new WorkPlanResource($work_plan),
                $this->message,
            );
        }

        $work_plan = WorkPlan::query();
        $result = $work_plan->orderBy('id', 'desc')->paginate($limit);
        return ResponseFormatter::success(
            WorkPlanResource::collection($result),
            $this->message
        );
    }
}
