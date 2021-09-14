<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteWorkPlanController extends Controller
{
    protected $message = 'success delete message';

    public function __invoke(WorkPlan $work_plan)
    {
        $file_managers = [];
        foreach($work_plan->file_manager as $file_manager) {
            $file_managers[] = $file_manager->file;
        }

        Storage::disk('public')->delete($file_managers);
        $result = $work_plan->delete();
        
        return ResponseFormatter::success(
            $result,
            $this->message
        );

    }
}
