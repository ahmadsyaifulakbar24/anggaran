<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlan\WorkPlanResource;
use App\Models\User;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StatusController extends Controller
{
    public function status(Request $request, WorkPlan $work_plan)
    {
        $user = User::find(Auth::user()->id);
        $status_field = ($user->hasRole('admin')) ? 'admin_status' : 'deputi_status';

        $this->validate($request, [
            'status' => [ 
                'required', 
                'in:pending,accept,decline',
                Rule::unique('work_plans', $status_field)->where(function($query) use ($work_plan) {
                    return $query->where('id', $work_plan->id);
                })
            ],
            'comment' => ['required', 'string'],
        ]);
        
        // Update work plan
        $user_work_plan = $work_plan->with('user')->first();
        if($user->hasRole('admin')) {
            $work_plan_data = [ 'deputi_status' => $request->status, 'admin_status' => $request->status ];
            $notification_data = [
                    [
                        'created_by' => Auth::user()->id,
                        'sent_to' => $user_work_plan->user_id,
                        'type' => 'work_plan',
                    ],
                    [
                        'created_by' => Auth::user()->id,
                        'sent_to' => $user_work_plan->user->parent_id,
                        'type' => 'work_plan',
                    ]
            ];
        } else {
            if($request->status == 'accept') {
                $work_plan_data = [ 'deputi_status' => $request->status, 'admin_status' => 'pending'];
                $sent_to = Auth::user()->parent_id;
            } else {
                $work_plan_data = [ 'deputi_status' => $request->status ];
                $sent_to = $user_work_plan->user_id;
            }
            $notification_data = [
                [
                    'created_by' => Auth::user()->id,
                    'sent_to' => $sent_to,
                    'type' => 'work_plan',
                ]
            ];
        }
        $work_plan->update($work_plan_data);

        // Insert comment work plan
        $work_plan->comment()->create([ 
            'comment' => $request->comment ,
            'user_id' => Auth::user()->id
        ]);
        
        // insert history work plan
        $history = $work_plan->history()->create([ 
            'status' => $request->status . ' work plan', 
            'action_by' => Auth::user()->id,
        ]);

         // Insert notification Work Plan
         $notification_data[0]['history_id'] = $history->id;
         if($user->hasRole('admin')) {
             $notification_data[1]['history_id'] = $history->id;
         }
         $work_plan->notification()->createMany($notification_data);

        return ResponseFormatter::success(
            new WorkPlanResource($work_plan),
            'success update status work plan data'
        );
    }
}
