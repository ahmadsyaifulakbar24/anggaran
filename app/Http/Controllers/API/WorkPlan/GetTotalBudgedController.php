<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetTotalBudgedController extends Controller
{
    public function totalBudgetByUserProgram(Request $request)
    {
        $request->validate([
            'unit_id' => ['required', 'units,id']
        ]);
    }
}
