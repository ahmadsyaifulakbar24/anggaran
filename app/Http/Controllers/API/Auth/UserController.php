<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function fetch(Request $request)
    {
        return ResponseFormatter::success(
            $request->user(),
            'success get user profile',
        );
    }
}
