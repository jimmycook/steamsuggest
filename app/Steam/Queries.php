<?php

namespace App\Steam;

class Steamy
{

    protected $exists = false;
    public $player;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function find($vanity) {
        $steamid = $client->getSteamId($name);

        if ($steamid) {
            $this->exists = true;
        }

        $player = $client->getPlayerSummary($steamid);
        dd($player);
        return $this;
    }

}
