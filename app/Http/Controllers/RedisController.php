<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Cache;

class RedisController extends Controller
{
    public function setInfo(Request $request){
        if($request->get('info') == ""){
            return response('',400);
        }
        
        cache()->set('info', $request->get('info'));
    
        return response()->json(['info_recebida' => Cache::get('info')]);
    }

    public function getInfo(Request $request){
        return response()->json(['info' => Cache::get('info')]);
    }
}
