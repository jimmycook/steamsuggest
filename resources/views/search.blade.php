@extends('app')

@section('body')

    @include('partials.navbar')

    <div class="container">
        {{-- <avatar-box></avatar-box> --}}
        <played-search :player="player"></played-search>
        {{-- <suggested-game :player.sync="player"></suggested-game> --}}
        <br>

    </div>

@endsection
