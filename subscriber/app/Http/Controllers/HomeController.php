<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function test1(Request $request){
        Log::info(json_encode($request->all()));
        return response()->json($request->all());
    }

    public function test2(Request $request){
        Log::info(json_encode($request->all()));
        return response()->json($request->all());
    }
}
