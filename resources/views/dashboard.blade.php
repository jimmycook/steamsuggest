@extends('app')

@section('body')

@include('partials.navbar')
{{-- Content --}}
<div id="app" class="container">
    <p>
        @{{ message }}
    </p>
    <input type="text" v-model="message">

</div>

@endsection
