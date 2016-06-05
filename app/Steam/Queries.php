<?php

namespace App\Steam;

class Queries
{

    public $player;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function find($steamid) {
        $this->client
    }

}
