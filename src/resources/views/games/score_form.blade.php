<form class="form" method="POST" action="{{route(
        'game.score',
        ['game' => $game->id,
         'participant' => $participant->id
         ])
         }}">
    {{ @csrf_field() }}
    <div class="form-group col-xs-12">
        <input class="form-control col-xs-1" type="text" name="score">
        <input type="submit" value="+" class="col-xs-1 btn btn-primary">
    </div>
</form>