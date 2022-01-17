<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    public function fetch(Request $request) 
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:users,id'],
            'role' => ['nullable', 'exists:roles,name'],
            'parent_id' => ['nullable', 'exists:users,id'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 15);

        if($request->id) {
            $user = User::findOrFail($request->id);
            return ResponseFormatter::success(
                new UserResource($user),
                'success get user data'
            );
        }

        if($request->parent_id) {
            $user = User::where('parent_id', $request->parent_id)->paginate($limit);
        } else if($request->role) {
            $user = User::role($request->role)->paginate($limit);
        } else {
            $user = User::paginate($limit);
        }


        return ResponseFormatter::success(
            UserResource::collection($user),
            'success get user data'
        );
    }

}
