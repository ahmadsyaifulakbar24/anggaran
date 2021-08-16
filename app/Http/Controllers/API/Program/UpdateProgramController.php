<?php

namespace App\Http\Controllers\API\Program;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Program\UpdateProgramRequest;
use App\Http\Resources\Program\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;

class UpdateProgramController extends Controller
{
    public function __invoke(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->only(['code_program', 'description']));
        return ResponseFormatter::success(
            new ProgramResource($program),
            'success update program data'
        );
    }
}
