<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Cache;

class ServerSentEvents extends Controller
{
    public function stream(){
        return response()->stream(function () {
            while (true) {
                echo "event: ping\n";
                echo 'data: {"info": "' . Cache::get('info') . '"}';
                echo "\n\n";

                ob_flush();
                flush();
                if (connection_aborted()) {break;}
                usleep(5000000); // 50ms
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
            'Access-Control-Allow-Origin' => '*',
        ]);
    }
}
