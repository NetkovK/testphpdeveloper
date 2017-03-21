<?php

namespace App\Http\Middleware;

use Closure;

class PostMiddleware
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
        if(!is_null($request->post) && $request->post->user_id != \Auth::user()->id) return redirect()->route('users.posts', \Auth::user()->id)->with(['messages'=>['Вы не можете редактировать чужие статьи'], 'error'=>1]);

        return $next($request);
    }
}
