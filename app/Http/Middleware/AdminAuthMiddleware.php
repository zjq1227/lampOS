<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
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
         //当 auth 中间件判定某个用户未认证，会返回一个 JSON 401 响应，或者，如果不是 Ajax 请求的话，将用户重定向到 login 命名路由（也就是登录页面）。
         if (auth()->guard('admin')->guest()) { 
            if ($request->ajax() || $request->wantsJson()) { 
                return response('Unauthorized.', 401); 

             } else {
               return redirect()->guest('admin/login');
        
             }
        }
    }
}