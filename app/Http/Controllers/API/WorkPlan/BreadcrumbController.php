<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\BreadcrumbResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BreadcrumbController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'breadcrumb_type' => ['required', 'in:activity,kro,ro,work_plan'],
            'user_program_id' => [
                Rule::requiredIf($request->breadcrumb_type == 'activity'),
                'exists:user_programs,id'
            ],
            'user_activity_id' => [
                Rule::requiredIf($request->breadcrumb_type == 'kro'),
                'exists:user_activities,id'
            ],
            'user_kro_id' => [
                Rule::requiredIf($request->breadcrumb_type == 'ro'),
                'exists:user_kro,id'
            ],
            'user_ro_id' => [
                Rule::requiredIf($request->breadcrumb_type == 'work_plan'),
                'exists:user_ro,id'
            ]
        ]);

        return ResponseFormatter::success(
            new BreadcrumbResource($request),
            'success get breadcrumb data'
        );
    }
}
