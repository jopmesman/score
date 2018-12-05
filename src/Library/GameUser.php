<?php

namespace Jopmesman\Score\Library;


use App\User;
use Jopmesman\Score\Models\Game;
use Jopmesman\Score\Models\Participant;

class GameUser
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @return collection with games
     */
    public function games()
    {
        return Game::where('user_id', $this->user->id)->get();
    }


    public function participating(){
        return Participant::where('user_id', $this->user->id)->with('game')->get();
    }


    public function gamesToPlay(){
        $gamesToPlay = $this->games();

        $this->participating()->map(function($participant) use(&$gamesToPlay){
            $gamesToPlay = $gamesToPlay->merge(collect([$participant->game]))->unique('id');
        });

        return $gamesToPlay;
    }
}