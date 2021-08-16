<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class DeleteProgramController extends Controller
{
    public function __invoke(Program $program)
    {
        $cek = Program::where('parent_id', $program->id)->count();
        
        if($cek >= 1) {
            return ResponseFormatter::error([
                'message' => 'cannot delete this program because it already has data'
            ], 'delete program failed', 422);
        }

        $result = $program->delete();
        return ResponseFormatter::success(
            $result,
            'success delete program data'
        );
    }
}
