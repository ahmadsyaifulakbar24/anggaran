<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileManager\FileManagerResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FileManagerController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'work_plan_id' => ['required', 'exists:work_plans,id'],
            'file' => ['required', 'file'],
            'type_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'file_type');
                })
            ]
        ]);

        if($request->file('file')) {
            $path = FileHelpers::upload_file('work_plan_file', $request->file, true);
        }

        $work_plan = WorkPlan::find($request->work_plan_id);
        $file = $work_plan->file_manager()->create([ 
            'file' => $path,
            'type_id' => $request->type_id,
        ]);
        return ResponseFormatter::success(
            new FileManagerResource($file),
            'success upload file'
        );
    }
}
