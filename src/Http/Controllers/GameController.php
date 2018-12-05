<?php

namespace Jopmesman\Score\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jopmesman\Score\Library\GameUser;
use Jopmesman\Score\Models\Game;
use Jopmesman\Score\Models\Participant;
use Jopmesman\Score\Models\Round;

class GameController extends Controller{

    public function index(){
        $authUser = \Auth::user();
        $gameUser = new GameUser($authUser);
        $games = $gameUser->gamesToPlay();

        return view('score::games.index', compact('games'));
    }

    public function create(Request $request){
        return view('score::games.create');
    }

    public function game(Game $game)
    {
        // Let's sort by points
        $participants = $game->participants->each(function($participant){
            $participant->points = $participant->points();
            return $participant;
        });
        $participants = $participants->sortByDesc('points');
        return view('score::games.view', compact('participants', 'game'));
    }

    public function score(Request $request, Game $game, Participant $participant)
    {
        $score = $request->input('score');

        // Validate it with a type. Basic check is to check if it ia a number
        // Let's save the score and send it back to browser
        $round = new Round();
        $round->score = $score;
        $round->participant_id = $participant->id;
        $round->save();


        return redirect()->route('game.view', $game->id);
    }
}