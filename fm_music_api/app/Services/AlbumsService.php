<?php

namespace App\Services;

use GuzzleHttp\Client;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Config;

class AlbumsService
{
    protected $client;
    protected $apiKey;
    protected $sharedSecret;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Config::get('services.lastfm.base_url'),
        ]);
        $this->apiKey = Config::get('services.lastfm.api_key');
        $this->sharedSecret = Config::get('services.lastfm.shared_secret');
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

    public function getAllAlbums()
    {
        $response = $this->client->request('GET', '', [
            'query' => [
                'method' => 'album.search',
                'album' => '',  // Add the album parameter for specific album search
                'api_key' => $this->apiKey,
                'format' => 'json',
                'limit' => 1000,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        
        // Extract the relevant information from the response
        if (isset($data['results']['albummatches']['album'])) {
            $albums = $data['results']['albummatches']['album'];
            $albumNames = array_column($albums, 'name');

            return response()->json($albumNames);
        } else {
            return response()->json(['error' => 'Error occurred while retrieving the album list.']);
        }
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