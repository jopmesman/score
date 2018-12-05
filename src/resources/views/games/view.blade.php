@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$game->created_at->format('d-m-Y H:i')}}</div>
            </div>
            @foreach($participants as $participant)
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        {{$participant->name}}
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <span class="pull-right">
                            {{$participant->points}}
                        </span>
                    </div>
                    <div class="col-md-4 hidden-xs">
                        @include('score::games.score_form', ['participant' => $participant])
                    </div>
                </div>
                <div class="row hidden-sm hidden-lg hidden-md">
                    <div class="col-xs-12">
                        @include('score::games.score_form', ['participant' => $participant])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
