<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CreateUserController extends Controller
{
    public function user_asdep(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'unique:users,username'],
            'name' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8']
        ]);
        
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['parent_id'] = Auth::user()->id;
        $input['unit_id'] = Auth::user()->unit_id;
        $user = User::create($input);
        $user->assignRole('asdep');

        return ResponseFormatter::success(
            new UserResource($user),
            'success create new user'
        );
    }
}
