<?php

namespace App\Services;

use GuzzleHttp\Client;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Config;

class LastFmService
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


    // Search artist by name

    public function searchArtist($artist)
    {
        $response = $this->client->post('', [
            'query' => [
                'method' => 'artist.search',
                'artist' => $artist,
                'api_key' => $this->apiKey,
                'format' => 'json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    // Get all artists
   
    public function getAllArtists()
    {
        try {
            $response = $this->client->get('', [
                'query' => [
                    'method' => 'chart.getTopArtists',
                    'api_key' => $this->apiKey,
                    'format' => 'json'
                    // Add any other required parameters for the API method
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            // Process the $result array as per your requirement

            return $result;
        } catch (ClientException $exception) {
            // Handle the exception and log or display the error message
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            $errorMessage = $response->getBody()->getContents();
            // Handle the error message appropriately
        }
    }

    // Get track info
    public function getTrackInfo($artist, $track)
    {
        $response = $this->client->get('track.getInfo', [
            'query' => [
                'method' => 'track.getInfo',
                'artist' => $artist,
                'track' => $track,
                'api_key' => $this->apiKey,
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        // Process the response data as needed

        return response()->json($data);
    }

    

    public function createArtist($artistData)
    {
        $response = $this->client->post('', [
            'form_params' => [
                'method' => 'artist.create',
                'api_key' => $this->apiKey,
                'artist' => $artistData['name'], // Assuming 'name' is the required field
                'genre' => $artistData['genre'],
                'bio' => $artistData['biography'],
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Check if the artist was successfully created
        if (isset($data['artist']['name'])) {
            return $data['artist']; // Return the created artist data
        }

        // Handle any errors or exceptions (e.g., artist creation failed)
        // You can return an error message or throw an exception based on your requirements
        throw new \Exception('Failed to create artist');
    }


    public function getArtist($id)
    {
        $response = $this->client->get('', [
            'query' => [
                'method' => 'artist.getInfo',
                'api_key' => $this->apiKey,
                'artist' => $id,
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Check if the artist information was successfully retrieved
        if (isset($data['artist'])) {
            return $data['artist']; // Return the artist data
        }

        // Handle any errors or exceptions (e.g., artist not found)
        // You can return an error message or throw an exception based on your requirements
        throw new \Exception('Artist not found');
    }

    public function updateArtist($id, $artistData)
    {
        $response = $this->client->post('', [
            'form_params' => [
                'method' => 'artist.update',
                'api_key' => $this->apiKey,
                'artist' => $id,
                'name' => $artistData['name'], // Assuming 'name' is one of the fields to update
                // Include other necessary fields to update
                // 'genre' => $artistData['genre'],
                // 'bio' => $artistData['biography'],
                // ...
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Check if the artist was successfully updated
        if (isset($data['artist']['name'])) {
            return $data['artist']; // Return the updated artist data
        }

        // Handle any errors or exceptions (e.g., artist update failed)
        // You can return an error message or throw an exception based on your requirements
        throw new \Exception('Failed to update artist');
    }

    public function deleteArtist($id)
    {
        $response = $this->client->post('', [
            'form_params' => [
                'method' => 'artist.delete',
                'api_key' => $this->apiKey,
                'artist' => $id,
                'format' => 'json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Check if the artist was successfully deleted
        if (isset($data['status']) && $data['status'] == 'ok') {
            return 'Artist deleted successfully';
        }

        // Handle any errors or exceptions (e.g., artist deletion failed)
        // You can return an error message or throw an exception based on your requirements
        throw new \Exception('Failed to delete artist');
    }

}