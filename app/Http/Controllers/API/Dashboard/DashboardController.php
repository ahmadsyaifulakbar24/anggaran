<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VwBudgedAsdep;
use App\Models\VwBudgedDeputi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function budget_statistics()
    {
        $user = User::findOrfail(Auth::user()->id);
        
        if($user->hasRole('admin')) {
            $budged = VwBudgedDeputi::with('budged_asdep')->get();
        } else if($user->hasRole('deputi')) {
            $budged = VwBudgedDeputi::where('id', Auth::user()->unit_id)->with('budged_asdep')->get();
        } else {
            $budged = VwBudgedAsdep::where('id', Auth::user()->id)->get();
        }

        return ResponseFormatter::success(
            $budged,
            'success get budged statistics data'
        );
    }
}
