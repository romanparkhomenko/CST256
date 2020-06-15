<?php

namespace App\Http\Middleware;

use App\Services\Utility\MyLogger2;
use Closure;
use Illuminate\Support\Facades\Cache;

class MyTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        MyLogger2::info("Entered Middleware Test handle");
        if($request->username != null) {
            $value = Cache::store("file")->get("mydata");
            if ($value == null) {
                MyLogger2::info("Caching first time Username for " . $request->username);
                Cache::store("file")->put("mydata", $request->username, 1);
            }
        } else {
            $value = Cache::store("file")->get("mydata");
            if ($value != null) {
                MyLogger2::info("Getting Username from Cache " . $value);
            } else {
                MyLogger2::info("Could not get Username from Cache (data is older than 1 minute)");
            }
        }
        return $next($request);
    }
}
