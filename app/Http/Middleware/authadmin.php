<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class authadmin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user != null){
            return $next($request);
        }else{
        return redirect()->route('admin.login');
        }



    }
}
