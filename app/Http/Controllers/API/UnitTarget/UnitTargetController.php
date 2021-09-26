<?php

namespace App\Http\Controllers\API\UnitTarget;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\UnitTarget;
use Illuminate\Http\Request;

class UnitTargetController extends Controller
{
    public function fetch(Request $request) 
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:unit_targets,id']
        ]);

        if($request->id) {
            $unit_target = UnitTarget::findOrFail($request->id);
            return ResponseFormatter::success(
                $unit_target,
                'success get unit target data'
            );
        }

        $unit_target = UnitTarget::query();
        return ResponseFormatter::success(
            $unit_target->orderBy('name', 'asc')->get(),
            'success get unit target data'
        );
    }
}
