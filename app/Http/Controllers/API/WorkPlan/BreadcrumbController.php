<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class BreadcrumbController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'breadcrumb_type' => ['required', 'in:activity,kro,ro,work_plan'],
            'user_program_id' => [
                Rule::requiredIf()
            ]
        ]);
    }
}
