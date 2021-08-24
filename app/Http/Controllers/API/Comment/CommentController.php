<?php

namespace App\Http\Controllers\API\Comment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\WorkPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'work_plan_id' => ['required', 'exists:work_plans,id'],
            'comment' => ['required', 'string']
        ]);

        $work_plan = WorkPlan::find($request->work_plan_id);
        $comment = $work_plan->comment()->create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
        ]);

        return ResponseFormatter::success(
            new CommentResource($comment),
            'succes create comment data'
        );
    }
}
