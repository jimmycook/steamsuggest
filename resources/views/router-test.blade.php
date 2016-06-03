@extends('app')

@section('body')
<div id="app">
    <h1>Testing the router</h1>
    <p>
        <a v-link="{ path: '/foo' }">Go to Foo</a>
       <a v-link="{ path: '/bar' }">Go to Bar</a>
   </p>
   <router-view></router-view>
</div>
@endsection
