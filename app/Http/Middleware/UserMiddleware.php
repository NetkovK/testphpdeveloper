<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;

class UserMiddleware
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
        if(!is_null($request->user) && $request->user->id == 1) return redirect()->route('users')->with(['messages'=>['Нельзя редактировать суперадминистратора'], 'error'=>1]);
        if(\Auth::user()->role_id != Role::ADMIN ) return redirect()->route('users')->with(['messages'=>['У Вас недостаточно прав'], 'error'=>1]);

        return $next($request);
    }
}
