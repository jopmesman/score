<?php

namespace Jopmesman\Score\Http\Middleware;

use Closure;
use Jopmesman\Score\Library\GameUser;

class gameParticipant
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
        $user = \Auth::user();
        $gameUser = new GameUser($user);
        $games = $gameUser->gamesToPlay()->pluck('id')->toArray();

        $gameToView = $request->game->id;

        if(!in_array($gameToView, $games)){
            abort('403', ' Deze mag je niet zien');
        }

        return $next($request);
    }
}