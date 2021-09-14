<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function update_data(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
        ]);

        $user->update($request->all());

        return ResponseFormatter::success(
            new UserResource($user),
            'success update user'
        );
    }

    public function reset_password(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        $user->update([ 'password' => Hash::make($request->password) ]);
        return ResponseFormatter::success(
            new UserResource($user),
            'success update password data'
        );
    }
}
