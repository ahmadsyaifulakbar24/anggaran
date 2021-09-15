<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Program\UpdateProgramRequest;
use App\Http\Resources\Program\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProgramController extends Controller
{
    public function __invoke(UpdateProgramRequest $request, Program $program)
    {
        $input = $request->only(['code_program', 'description']);
        $input['parent_id'] = ($request->parent_id) ? $request->parent_id : null;
        $input['code_program'] = $request->code_program;
        $input['description'] = $request->description;
        $input['updated_by'] = Auth::user()->id;

        $program->update($input);
        return ResponseFormatter::success(
            new ProgramResource($program),
            'success update program data'
        );
    }
}
