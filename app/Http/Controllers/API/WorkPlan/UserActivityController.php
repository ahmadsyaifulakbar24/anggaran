<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\UserActivityResource;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserActivityController extends Controller
{
    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'user_program_id' => ['required', 'exists:user_programs,id'],
            'activity_id' => [
                'required',
                Rule::exists('programs', 'id')->where(function($query) use ($request) {
                    $user_program = UserProgram::find($request->user_program_id);
                    if(!empty($user_program)) {
                        return $query->where('parent_id', $user_program->program_id);
                    }
                }),
                Rule::unique('user_activities', 'activity_id')->where(function($query) use ($user, $request) {
                    return $query->where([['user_program_id', $request->user_program_id], ['unit_id', $user->unit_id]]);
                })
            ]
        ]);

        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user program data');
        }

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['unit_id'] = $user->unit_id;

        $user_activity = UserActivity::create($input);
        return ResponseFormatter::success(
            new UserActivityResource($user_activity),
            'succcess create user activity data'
        );
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'user_activity_id' => ['nullable', 'exists:user_activities,id'],
            'user_program_id' => ['nullable', 'exists:user_programs,id'],
            'limit' => ['nullable', 'int'],
        ]);
        $limit = $request->input('limit', 10);
        if($request->user_activity_id) {
            $user_activity = UserActivity::find($request->user_activity_id);
            return ResponseFormatter::success(
                new UserActivityResource($user_activity),
                'success get user activity data'
            );
        }

        $user_activity = UserActivity::query();
        if($request->user_program_id) {
            $user_activity->where('user_program_id', $request->user_program_id);
        }

        return UserActivityResource::collection($user_activity->paginate($limit));
    }

    public function update(Request $request, UserActivity $user_activity)
    {
        $request->validate([
            'activity_id' => [
                'required',
                Rule::exists('programs', 'id')->where(function($query) use ($user_activity) {
                    $user_program = UserProgram::find($user_activity->user_program_id);
                    return $query->where('parent_id', $user_program->program_id);
                }),
                Rule::unique('user_activities', 'activity_id')->ignore($user_activity->id)->where(function($query) use ($user_activity) {
                    $user_program = UserProgram::find($user_activity->user_program_id);
                    return $query->where([['user_program_id', $user_program->user_program_id], ['unit_id', $user_activity->unit_id]]);
                })
            ]
        ]);

        $user = User::find(Auth::user()->id);
        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user program data');
        }

        $user_activity->update([
            'activity_id' => $request->activity_id
        ]);

        return ResponseFormatter::success(
            new UserActivityResource($user_activity),
            'success update user activity data'
        );

    }

    public function delete(UserActivity $user_activity)
    {
        if($user_activity->user_kro()->count() > 0) {
            return ResponseFormatter::errorValidation([
                'user_activity_id' => "can't delete this activity because the data already exits"
            ], 'failed delete user activity data');
        }
        $result = $user_activity->delete();
        return ResponseFormatter::success(
            $result,
            'success delete user activity data'
        );
    }
}
