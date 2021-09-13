<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Resources\Program\ProgramResource;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class CreateProgramController extends Controller
{
    public function __invoke(StoreProgramRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;
        
        if($request->parent_id) {
            $program = Program::find($request->parent_id);

            $input['parent_path'] = ($program->parent_path) ? $program->parent_path.",".$program->id : $program->id;

            if($program->program_type == 'program') {
                $input['program_type'] = 'activity';
            } else {
                return ResponseFormatter::error([
                    'message' => 'cannot create program for this parent'
                ], 'create program failed', 422);
            }
        } else {
            $input['program_type'] = 'program';
        }

        $program = Program::create($input);
        return ResponseFormatter::success(
            new ProgramResource($program),
            'success create data program'
        );
    }
}
