<?php

namespace Jopmesman\Score\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function game()
    {
        return $this->belongsTo('Jopmesman\Score\Models\Game');
    }

    public function rounds(){
        return $this->hasMany('Jopmesman\Score\Models\Round');
    }

    public function points(){
        $points = array_sum($this->rounds->pluck('score')->toArray());
        return $points;
    }
}
