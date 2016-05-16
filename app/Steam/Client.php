<?php

namespace App\Steam;

use Httpful\Request;

class Client {

    protected $key;

    protected $url;

    protected $response;

    public function __construct($url = 'http://api.steampowered.com/')
    {
        $this->key = config('steam.key');
        $this->url = $url;
    }

    public function getSteamId($vanityurl) {
        $this->call('ISteamUser', 'ResolveVanityURL', '0001', ['vanityurl' => $vanityurl]);

        return $this->getData()->steamid;
    }

    public function getPlayerSummary($steamid) {
        
        $this->call('ISteamUser', 'GetPlayerSummaries', '0002', ['steamids' => $steamid]);

        return $this->getData()->players[0];
    }

    /**
     * Get data from the current response
     * @return mixed
     */
    private function getData()
    {
        if (!$this->response)
        {
            throw new \Exception('No response');
        }

        return $this->response->body->response;        
    }

    /**
     * Call the steam api
     * @param  string $interface
     * @param  string $method
     * @param  string $version
     * @param  array $params
     * @return Httpful\Response
     */
    private function call($interface, $method, $version, $params) {
        $uri = $this->url . "$interface/$method/v$version?";

        foreach ($params as $name => $value) {
            $uri .= "$name=$value&";
        }

        $uri .= "key=$this->key";

        return $this->response = $this->execute($uri);
    }

    /**
     * Execute a request to the API, and expect JSON back
     * @param  string $uri
     * @return object
     */
    private function execute($uri) {
        return Request::get($uri)->send();
    }

}
