<?php

namespace App\Http\Controllers\API\AdminSetting;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminSetting\AdminSettingResource;
use App\Models\AdminSetting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function create_message (Request $request) 
    {
        $request->validate([
            'message' => ['required', 'string']
        ]);

        $admin_setting = AdminSetting::find(1);
        if(empty($admin_setting)) {
            $admin_setting = AdminSetting::create(['message' => $request->message ]);
            $message = 'success create message';
        } else {
            $admin_setting->update([ 'message' => $request->message ]);
            $message = 'success update message';
        }

        return ResponseFormatter::success(
            new AdminSettingResource($admin_setting),
            $message
        );
    }

    public function get_message() 
    {
        $admin_setting = AdminSetting::find(1);
        return ResponseFormatter::success(
            new AdminSettingResource($admin_setting),
            'success get admin setting data'
        );
    }
}
