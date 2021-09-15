<?php

namespace App\Http\Controllers\API\Ro;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ro\RoResource;
use App\Models\CodeRo;
use Illuminate\Http\Request;

class RoController extends Controller
{
    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:code_ro,id'],
            'search' => ['nullable', 'string']
        ]);

        if($request->id) {
            $code_ro = CodeRo::findOrFail($request->id);
            return ResponseFormatter::success(
                new RoResource($code_ro),
                'success get code ro data'
            );
        }

        $code_ro = CodeRo::query();
        if($request->search) {
            $code_ro->where('code_ro', 'like', '%'.$request->search.'%');
        }

        return ResponseFormatter::success(
            RoResource::collection($code_ro->get()),
            'success get code ro data'
        );
    }
}
