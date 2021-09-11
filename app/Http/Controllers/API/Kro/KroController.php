<?php

namespace App\Http\Controllers\API\Kro;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Kro\KroResource;
use App\Models\Kro;
use Illuminate\Http\Request;

class KroController extends Controller
{
    public function fetch(Request $request)
    {
        $this->validate($request, [
            'id' => ['nullable', 'exists:kro,id'],
            'search' => ['nullable', 'string']
        ]);

        if($request->id) {
            $kro = Kro::find($request->id);
            return ResponseFormatter::success(
                new KroResource($kro),
                'success get data kro'
            );
        }

        $search = $request->search;
        $kro = Kro::query();

        if($search) {
            $kro->where('code_kro_non_pn', 'like', '%'. $search .'%')
            ->orWhere('code_kro_pn', 'like', '%'. $search .'%')
            ->orWhere('kro', 'like', '%'. $search .'%');
        }

        return ResponseFormatter::success(
            KroResource::collection($kro->get()),
            'success get kro data'
        );
    }
}
