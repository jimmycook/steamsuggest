<?php

use App\Steam\Client as Client;
use App\Steam\Player as Player;

Route::get('test', function(Player $player, Client $client) {
    dd( $client->getGameInfo(10) );
    // return $return;
});


// Home Page
Route::get('/', function () {
    return view('router-test');
});

// Setting up the router to play nice with the vue router for the application
Route::get('app/{jsroute?}', [function () {
    return view('router-test');
}])->where(['jsroute' => '.*']);

// Setup the API routes
Route::group(['middlewear' => 'api', 'prefix' => 'api'], function() {
    Route::get('{name}/gamesplayed', function ($name, Client $client) {
        // Get steam id
        $steamid = $client->getSteamId($name);

        if (!$steamid) {
            return json_encode(["status" => false]);
        }

        $ownedGames = $client->getOwnedGames($steamid);

        if ($ownedGames->game_count < 1) {
            return json_encode(["status" => false]);
        }

        $count = $ownedGames->game_count;

        $played = 0;
        foreach ($ownedGames->games as $game) {
            if ($game->playtime_forever < 1) {
                $played++;
            }
        }

        $response = [
            "games" => $ownedGames->game_count,
            "played" => $played,
            "status" => true
        ];

        return json_encode($response);
    });

    Route::get('player/{name}', function ($name, Player $player) {
        return $player->find($name)->getAll();
    });

    Route::get('test', function(Player $player, Client $client) {
        return json_encode($client->getGameInfo(300));        
    });
});
