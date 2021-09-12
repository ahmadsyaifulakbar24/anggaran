<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required', 'min:8'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        $user = User::find(Auth::user()->id);
        if(!Hash::check($request->old_password, $user->password)) {
            return ResponseFormatter::errorValidation([
                'old_password' => ['wrong old password']
            ], 'The given data was invalid.');
        } else {
            $user->update([ 'password' => Hash::make($request->password) ]);
            return ResponseFormatter::success(
                new UserResource($user),
                'success update password'
            );
        }
    }
}
