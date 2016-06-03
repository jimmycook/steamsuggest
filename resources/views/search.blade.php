@extends('app')

@section('body')
    <div id="app">
        @include('partials.navbar')

        <div class="container">
            <played-search :player="player" v-show="!player"></played-search>
            {{-- <suggested-game :player.sync="player"></suggested-game> --}}
            <div v-show="player">
                <avatar-box :player="player"></avatar-box>

            </div>
        </div>
        <pre>
            @{{ player | json 4}}
        </pre>        
    </div>
@endsection
