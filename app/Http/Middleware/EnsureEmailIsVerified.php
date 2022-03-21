<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //三次判斷
        //1.如果用戶已登入
        //2.且沒有認證 Email
        //3.且訪問的不是 email 認證相關URL或登出的URL
        if($request->user() &&
        ! $request->user()->hasVerifiedEmail() &&
        ! $request->is('email/*', 'logout')){

            // 返回對應的內容
            return $request->expectsJson()
            ? abort(403, 'Your email address is not verified.')
            : redirect()->route('verification.notice');
        }
        return $next($request);
    }
}
