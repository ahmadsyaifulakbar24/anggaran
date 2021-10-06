<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\UserKroResource;
use App\Models\User;
use App\Models\UserKro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserKroController extends Controller
{
    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'user_activity_id' => ['required', 'exists:user_activities,id'],
            'kro_id' => [
                'required',
                'exists:kro,id',
                Rule::unique('user_kro', 'kro_id')->where(function($query) use ($user){
                    return $query->where('user_id', $user->id);
                })
            ],
            'type_kro' => ['required', 'in:pn,non_pn']
        ]);

        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error create user kro data');
        }
        
        $input = $request->all();
        $input['user_id'] = $user->id;

        $user_kro = UserKro::create($input);
        return ResponseFormatter::success(
            new UserKroResource($user_kro),
            'succcess create user kro data'
        );
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'user_kro_id' => ['nullable', 'exists:user_kro,id'],
            'user_activity_id' => ['nullable', 'exists:user_activities,id'],
            'limit' => ['nullable', 'int'],
        ]);
        $limit = $request->input('limit', 10);

        if($request->user_kro_id) {
            $user_kro = UserKro::find($request->user_kro_id);
            return ResponseFormatter::success(
                new UserKroResource(($user_kro)),
                'success get user kro data'
            );
        }

        $user_kro = UserKro::query();
        if($request->user_activity_id) {
            $user_kro->where('user_activity_id', $request->user_activity_if);
        }

        return $user_kro->orderBy('id', 'desc')->paginate($limit);
    }

    public function update(Request $request, UserKro $user_kro)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'kro_id' => [
                'required',
                'exists:kro,id',
                Rule::unique('user_kro', 'kro_id')->ignore($user_kro->id)->where(function($query) use ($user, $user_kro){
                    return $query->where([['user_id', $user->id], ['kro_id', $user_kro->kro_id]]);
                })
            ],
            'type_kro' => ['required', 'in:pn,non_pn']
        ]);

        if(! $user->hasRole('asdep')) {
            return ResponseFormatter::errorValidation([
                'user_id' => 'user id is invalid'
            ], 'error update user kro data');
        }
        
        $user_kro->update([
            'kro_id' => $request->kro_id,
            'type_kro' => $request->type_kro
        ]);
        return ResponseFormatter::success(
            new UserKroResource($user_kro),
            'succcess update user kro data'
        );
    }

    public function delete(UserKro $user_kro)
    {
        if($user_kro->user_ro()->count() > 0) {
            return ResponseFormatter::errorValidation([
                'user_kro_id' => "can't delete this kro because the data already exits"
            ], 'failed delete user activity data');
        }

        $result = $user_kro->delete();
        return ResponseFormatter::success(
            $result,
            'success delete user kro data'
        );
    }
}
