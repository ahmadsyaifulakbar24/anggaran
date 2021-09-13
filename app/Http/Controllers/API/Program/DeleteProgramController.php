<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Program;
use Exception;
use Illuminate\Http\Request;

class DeleteProgramController extends Controller
{
    public function __invoke(Program $program)
    {   
        try {
            $result = $program->delete();
            return ResponseFormatter::success(
                $result,
                'success delete program data'
            );
        } catch (Exception $e) {
            ResponseFormatter::error([
                'message' => $e->getMessage(),
            ], 'delete program failed', 500);
        }
    }
}
