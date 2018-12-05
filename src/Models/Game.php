<?php

namespace Jopmesman\Score\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function participants(){
        return $this->hasMany('Jopmesman\Score\Models\Participant');
    }
}
