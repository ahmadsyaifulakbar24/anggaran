<?php

namespace App\Http\Controllers\API\Notification;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class UpdateNotificationController extends Controller
{
    public function read(Notification $notification)
    {
        $notification->update([
            'read' => 1,
            'date_read' => now(),
        ]);

        return ResponseFormatter::success(
            new NotificationResource($notification),
            'success update read status in notification'
        );
    }
}
