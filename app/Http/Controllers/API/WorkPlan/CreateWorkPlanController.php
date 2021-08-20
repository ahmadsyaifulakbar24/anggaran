<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateWorkPlanController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'program_id' => [
                'required',
                Rule::exists('programs', 'id')->where(function($query) {
                    return $query->where('program_type', '');
                })
            ],
        ]);
    }
}
