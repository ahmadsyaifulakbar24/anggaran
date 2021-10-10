<?php

namespace App\Http\Controllers\API\WorkPlan;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileManager\FileManagerResource;
use App\Models\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FileManagerController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'category' => ['required', 'in:work_plan,user_ro'],
            'work_plan_id' => [
                Rule::RequiredIf($request->category == 'work_plan'), 
                'exists:work_plans,id'
            ],
            'user_ro_id' => [
                Rule::RequiredIf($request->category == 'user_ro'), 
                'exists:user_ro,id'
            ],
            'file' => ['required', 'file', 'mimes:xls,xlsx,doc,docx,pdf,ppt,pptx'],
            'type_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'file_type');
                })
            ]
        ]);

        if($request->file('file')) {
            if($request->category == 'work_plan') {
                $path_file = 'work_plan_file';
                $input['work_plan_id'] = $request->work_plan_id;
            }  else {
                $path_file = 'user_ro_file';
                $input['user_ro_id'] = $request->user_ro_id;
            }
            $path = FileHelpers::upload_file($path_file, $request->file, true);
            $input['file'] = $path;
            $input['type_id'] = $request->type_id;
        }

        $file = FileManager::create($input);
        return ResponseFormatter::success(
            new FileManagerResource($file),
            'success upload file'
        );
    }

    public function fetch(Request $request)
    {
        $this->validate($request, [
            'work_plan_id' => ['required', 'exists:work_plans,id'],
        ]);

        $file_manager = FileManager::where('work_plan_id', $request->work_plan_id)->orderBy('id', 'desc')->get();
        return ResponseFormatter::success(
            FileManagerResource::collection($file_manager),
            'success get file manager data'
        );
    }

    public function delete(FileManager $file_manager)
    {
        Storage::disk('public')->delete($file_manager->file);
        $result = $file_manager->delete();

        Return ResponseFormatter::success(
            $result,
            'success delete file data'
        );
    }
}
