<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('admin.*') && !$request->user('admin')) {
                Session::flash('warning', 'You have to login first to get access');
                return route('admin.login');
            }
            if ($request->routeIs('user.*') && !$request->user('web')) {
                Session::flash('warning', 'You have to login first to get access');
                return route('login');
            }else{
                Session::flash('warning', 'You have to login first to get access');
                return route('admin.login');
            }
        }

        return null;
    }
}
