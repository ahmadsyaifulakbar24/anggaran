<?php

namespace App\Http\Controllers\API\Notification;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetNotificationController extends Controller
{
    private $get_message = 'success get notification data';

    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:notifications,id'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 15);

        if($request->id) {
            $notification = Notification::findOrFail($request->id);
            return ResponseFormatter::success(
                new NotificationResource($notification),
                $this->get_message
            );
        }

        $user = User::find(Auth::user()->id);

        $notification = Notification::query();

        if($user->hasRole('deputi')) {
            $notification->where('sent_to', $user->id);
        } else if($user->hasRole('asdep')) {
            $notification->where('created_by', $user->id);
        }
        
        return ResponseFormatter::success(
            NotificationResource::collection($notification->orderBy('created_at', 'desc')->paginate($limit)),
            $this->get_message
        );
    }
}
