<?php

use App\Steam\Client as Client;

Route::get('/', function (Client $client) {
    $steamid = $client->getSteamId('Jimmypq');
    $user = $client->getPlayerSummary($steamid);

    return view('home', ['user' => $user]);
});


Route::group(['middlewear' => 'api', 'prefix' => 'api'], function() {

	Route::get('player/{name}', function ($name, Client $client) {
        $steamid = $client->getSteamId('Jimmypq');
        $user = $client->getPlayerSummary($steamid);
        return json_encode($user);
	});

});
