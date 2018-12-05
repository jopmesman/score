@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Spellen
                </div>
                <div class="">
                    <a href="{{route('games.create')}}">Nieuw spel</a>
                </div>
            </div>
            @foreach($games as $game)
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('game.view', $game->id)}}">
                            {{$game->created_at->format('d-m-Y H:i')}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
