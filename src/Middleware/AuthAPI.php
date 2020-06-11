<?php

namespace Encore\Admin\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Encore\Admin\Admin;

class AuthAPI
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
        Admin::authAPI();
        return $next($request);
    }
}
