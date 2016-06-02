@extends('app')

@section('body')

    @include('partials.navbar')

    <div class="container">
        <avatar-box></avatar-box>
        <played-search></played-search>
        <suggested-game :player.sync="player"></suggested-game>
        <pre>
            @{{ player | json 4}}
        </pre>
    </div>

@endsection
