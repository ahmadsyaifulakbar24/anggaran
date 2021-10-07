<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\UserProgramResource;
use App\Models\User;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserProgramController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'program_id' => [
                'required', 
                'exists:programs,id',
                Rule::unique('user_programs', 'program_id')->where(function($query) use ($request) {
                    return $query->where('unit_id', $request->unit_id);
                })
            ]
        ]);
        $user = User::find(Auth::user()->id);
        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user program data');
        }

        $input = $request->all();
        $input['user_id'] = $user->id;
        $user_program = UserProgram::create($input);
        return ResponseFormatter::success(
            new UserProgramResource($user_program),
            'success create user program data'
        );
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'user_program_id' => ['nullable', 'exists:user_programs,id'],
            'unit_id' => ['nullable',  'exists:units,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);

        if($request->user_program_id) {
            $user_program = UserProgram::find($request->user_program_id);
            return ResponseFormatter::success(
                new UserProgramResource($user_program),
                'success get user program dat'
            );
        }

        $user_program = UserProgram::query();
        if($request->unit_id) {
            $user_program->where('unit_id', $request->unit_id);
        }

        if($request->user_id) {
            $user_program->where('user_id', $request->user_id);
        }
        
        return UserProgramResource::collection($user_program->orderBy('id', 'desc')->paginate($limit));

    }

    public function update(Request $request, UserProgram $user_program)
    {
        $request->validate([
            'program_id' => [
                'required', 
                'exists:programs,id',
                Rule::unique('user_programs', 'program_id')->ignore($user_program->id)->where(function($query) use ($user_program) {
                    return $query->where('unit_i', $user_program->unit_id);
                })
            ]
        ]);
        $input = $request->all();
        $user_program->update($input);
        return ResponseFormatter::success(
            new UserProgramResource($user_program),
            'success create user program data'
        );
    }

    public function delete(UserProgram $user_program)
    {
        if($user_program->user_activity()->count() > 0) {
            return ResponseFormatter::errorValidation([
                'user_program_id' => "can't delete this program because the data already exists"
            ], 'failed delete user program data');
        }
        
        $result = $user_program->delete();
        return ResponseFormatter::success(
            $result,
            'success delete user program data'
        );
    }
}
