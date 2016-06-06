<?php

namespace App\Steam;

use Cache;

class Player
{

    protected $exists = false;
    protected $client;
    protected $steamid;
    protected $games;
    protected $currentgame;
    protected $url;
    protected $info;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function find($url) {
        $this->url = $url;
        $this->steamid = Cache::rememberForever("steamid.$url", function() {
            return $this->client->getSteamId($this->url);
        });

        if ($this->steamid)
            $this->exists = true;

        return $this;

    }

    public function info($withGame = true) {
        if ($this->steamid) {
            $this->info = $this->client->getPlayerSummary($this->steamid);

            // not used anymore
            // if (isset($this->info->gameid)) {
            //     if ($withGame && $this->info->gameid) {
            //         // $this->info->ingame = $this->client->getGameInfo($this->info->gameid);
            //     }
            // }
        }

        return $this;
    }

    public function games() {
        if ($this->steamid)
            $this->games = $this->client->getOwnedGames($this->steamid);

        return $this;
    }

    public function get() {
        if ($this->exists) {
            $player = ['status' => true];
            $player['info'] = $this->info;
            $player['games'] = $this->games;
            $player['url'] = $this->url;
            // $player['currentgame'] = $this->currentgame;
            return $player;
        }
        return ['status' => false];
    }

    public function getAll() {
        return $this->info()->games()->get();
    }

}
