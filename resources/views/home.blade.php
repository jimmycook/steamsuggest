@extends('app')

@section('body')

@include('partials.navbar')

{{-- Content --}}
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Pressure</h1>
    <p class="lead">A bit of guidance for your steam collection.</p>
    <a href="/go" role="button" class="btn btn-primary-outline">Get Started</a>
  </div>
</div>
<div class="container">
    <h2>
      Countless games, yet nothing to play...
    </h2>
    <p>
      I'm building this to help guide me through my steam library, might be handy for you too.
    </p>
</div>

@endsection
