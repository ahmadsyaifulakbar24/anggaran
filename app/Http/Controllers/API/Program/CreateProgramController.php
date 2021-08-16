<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Resources\Program\ProgramResource;
use App\Models\Program;
class CreateProgramController extends Controller
{
    public function __invoke(StoreProgramRequest $request)
    {
        $input = $request->all();
        
        if($request->parent_id) {
            $program = Program::find($request->parent_id);

            $input['parent_path'] = ($program->parent_path) ? $program->parent_path.",".$program->id : $program->id;

            if($program->program_type == 'program') {
                $input['program_type'] = 'sub_program';
            } else if($program->program_type == 'sub_program') {
                $input['program_type'] = 'code_program';
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
