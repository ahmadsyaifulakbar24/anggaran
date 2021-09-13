<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Program\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;

class GetProgramController extends Controller
{
    public $message = 'success get program data';
    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['exists:programs,id'],
            'parent_id' => ['exists:programs,id']
        ]);

        if($request->id) {
            $program = Program::findOrFail($request->id);
            return ResponseFormatter::success(
                new ProgramResource($program),
                $this->message
            );
        }

        $program = Program::query();
        if($request->parent_id) {
            $program->where('parent_id', $request->parent_id);
        }

        return ResponseFormatter::success(
            ProgramResource::collection($program->get()),
            $this->message
        );
    }

    public function parent()
    {
        $program = Program::where('program_type', 'program')->get();
        
        return ResponseFormatter::success(
            ProgramResource::collection($program),
            $this->message
        );
    }
}
