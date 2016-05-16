@extends('app')

@section('content')

<div class="container">
    <h1>Steam Client</h1>
	
	<p>Name: {{ $user->personaname }}</p>
	<img src="{{ $user->avatarfull }}" alt='Avatar'>

</div>
@endsection
