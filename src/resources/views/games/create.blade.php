@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nieuw spel</div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <form class="form" method="POST">
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection