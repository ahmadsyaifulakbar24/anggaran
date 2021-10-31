<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\CityResource;
use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Param\ProvinceResource;
use App\Models\City;
use App\Models\Param;
use App\Models\Province;
use App\Models\Unit;
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

    public function target()
    {
        $target = Param::where('category', 'target')->get();
        return ResponseFormatter::success(
            ParamResource::collection($target),
            'success get target data'
        );
    }

    public function indicator() 
    {
        $indicator = Param::where('category', 'indicator')->get();
        return ResponseFormatter::success(
            ParamResource::collection($indicator),
            'success get indicator data'
        );
    }

    public function sources_of_funding()
    {
        $sources_of_funding = Param::where('category', 'sources_of_funding')->get();
        return ResponseFormatter::success(
            ParamResource::collection($sources_of_funding),
            'success get sources_of_funding data'
        );
    }

    public function units()
    {
        $units = Unit::all();
        return ResponseFormatter::success(
            $units,
            'success get units data'
        );
    }

    public function pph7()
    {
        $params = Param::where('category', 'pph7')->get();
        return ResponseFormatter::success(
            $params,
            'success get pp7 data'
        );
    }
}
