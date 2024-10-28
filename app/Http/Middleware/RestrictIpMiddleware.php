<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictIpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {
        $settings = Setting::latest('id')->first();
        if (isset($settings->api_verification) && $settings->api_verification == "1") {
            $apiKey = $request->header('X-API-KEY');

            $allowedIps = collect(json_decode($settings->allowed_ip, true))->pluck('value')->toArray();
            if (!in_array($apiKey, $allowedIps)) {
                return response()->json(['message' => 'Access Denied.'], 403);
            }
        }
        return $next($request);
    }
}
