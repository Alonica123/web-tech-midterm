<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\BoholInfo;

class BoholInfoControllerAPI extends Controller
{
    public function index()
    {
        $info = BoholInfo::all();
        return response()->json(['bohol_info'=>$info],200);
    }
}
