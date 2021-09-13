<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\CityResource;
use App\Http\Resources\Param\ProvinceResource;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class GetParamController extends Controller
{
    public function provinsi() 
    {
        $province = Province::all();
        return ResponseFormatter::success(
            ProvinceResource::collection($province),
            'success get province data'
        );
    }

    public function city(Request $request)
    {
        $this->validate($request, [
            'province_id' => ['required', 'exists:provinces,id']
        ]);

        $city = City::where('province_id', $request->province_id)->get();
        return ResponseFormatter::success(
            CityResource::collection($city),
            'success get city data'
        );
    }
}
