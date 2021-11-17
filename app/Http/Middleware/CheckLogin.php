<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class CheckLogin
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
        if ((!session('admin_id') && $request->route()->uri != 'admin/login') || (!redis::exists("admin_lock_".session('admin_id')) && $request->route()->uri != 'admin/login'))
        {
            return  redirect('admin/login');
        }
        
        return $next($request);
    }
}
