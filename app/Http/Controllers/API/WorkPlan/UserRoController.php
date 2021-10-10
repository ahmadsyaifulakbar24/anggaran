<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\UserRoResource;
use App\Models\User;
use App\Models\UserRo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRoController extends Controller
{
    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'user_kro_id' => ['required', 'exists:user_kro,id'],
            'code_ro' => [
                'required',
                Rule::unique('user_ro', 'code_ro')->where(function($query) use ($request, $user) {
                    return $query->where([['user_kro_id', $request->user_kro_id], ['unit_id', $user->unit_id]]);
                })
            ],
            'ro' => ['required', 'string'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
        ]);

        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user kro data');
        }

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['unit_id'] = $user->unit_id;

        $user_ro = UserRo::create($input);
        return ResponseFormatter::success(
            new UserRoResource($user_ro),
            'success create user ro data'
        );
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'user_ro_id' => ['nullable', 'exists:user_ro,id'],
            'user_kro_id' => ['nullable', 'exists:user_kro,id'],
            'limit' => ['nullable', 'int'],
        ]);
        $limit = $request->input('limit', 10);

        if($request->user_ro_id) {
            $user_ro = UserRo::find($request->user_ro_id);
            return ResponseFormatter::success(
                new UserRoResource($user_ro),
                'succes get user ro data'
            );
        }
        $user_ro = UserRo::query();
        if($request->user_kro_id) {
            $user_ro->where('user_kro_id', $request->user_kro_id);
        }

        return UserRoResource::collection($user_ro->paginate($limit));
    }

    public function update(Request $request, UserRo $user_ro)
    {
        $request->validate([
            'code_ro' => [
                'required',
                Rule::unique('user_ro', 'code_ro')->ignore($user_ro->id)->where(function($query) use ($user_ro) {
                    return $query->where([['user_kro_id', $user_ro->user_kro_id], ['unit_id', $user_ro->unit_id]]);
                })
            ],
            'ro' => ['required', 'string'],
            'unit_target' => ['required', 'exists:unit_targets,id'],
        ]);

        $user = User::find(Auth::user()->id);
        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user ro data');
        }

        $user_ro->update([
            'code_ro' => $request->code_ro,
            'ro' => $request->ro,
            'unit_target' => $request->unit_target,
        ]);

        return ResponseFormatter::success(
            new UserRoResource($user_ro),
            'success update user ro data'
        );
    }

    public function delete(UserRo $user_ro)
    {
        if($user_ro->work_plan()->count() > 0) {
            return ResponseFormatter::errorValidation([
                'user_activity_id' => "can't delete this ro because the data already exits"
            ], 'failed delete user ro data');
        }

        $result = $user_ro->delete();
        return ResponseFormatter::success(
            $result,
            'success delete user ro data'
        );
    }
}
