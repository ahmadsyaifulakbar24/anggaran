<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Program;
use Illuminate\Http\Request;

class DeleteProgramController extends Controller
{
    public function __invoke(Program $program)
    {
        $error_response = ResponseFormatter::error([
            'message' => 'cannot delete this program because it already has data'
        ], 'delete program failed', 422);

        $cek = Program::where('parent_id', $program->id)->count();
        if($cek >= 1) {
            return $error_response;    
        }

        if($program->program_type == 'code_program') {
            $activity_cek = Activity::where('program_id', $program->id)->count();
            if($activity_cek >= 1) {
                return $error_response;  
            }
        }
        
        $result = $program->delete();
        return ResponseFormatter::success(
            $result,
            'success delete program data'
        );
    }
}
