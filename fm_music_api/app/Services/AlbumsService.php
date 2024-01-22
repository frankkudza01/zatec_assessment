<?php

namespace App\Services;

use GuzzleHttp\Client;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Exception\ClientException;

class AlbumsService
{
    protected $client;
    protected $apiKey;
    protected $sharedSecret;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://ws.audioscrobbler.com/2.0/',
        ]);
        $this->apiKey = '286b3395c6f4c8604dbb38579fd26b7a';
        $this->sharedSecret = '9581923240aae739926b0100121becda';
    }

    public function searchAlbums($album)
    {
        $response = $this->client->request('POST', '', [
            'query' => [
                'method' => 'album.search',
                'album' => $album,
                'api_key' => $this->apiKey,
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Extract the relevant information from the response
        $albums = $data['results']['albummatches']['album'];

        return $albums;
    }

    public function getAlbumInfo($albumName, $artistName)
    {
        $response = $this->client->request('POST', '', [
            'query' => [
                'method' => 'album.getinfo',
                'album' => $albumName,
                'artist' => $artistName,
                'api_key' => $this->apiKey,
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Extract the relevant information from the response
        $album = $data['album'];

        return $album;
    }

    
}