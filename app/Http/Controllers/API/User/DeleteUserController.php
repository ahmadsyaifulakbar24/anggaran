<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function __invoke(User $user)
    {
        if($user->work_plan()->count() > 0) {
            return ResponseFormatter::error([
                'message' => "can't delete this user because the data already exists"
            ], 'delete user failed'. 422);
        }

        $result = $user->delete();
        return ResponseFormatter::success(
            $result,
            'success delete user'
        );
    }
}
