<?php

namespace App\Http\Controllers\Artists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LastFmService;
use App\Models\FavoriteArtist;

class ArtistController extends Controller
{
    protected $lastFmService;

    public function __construct(LastFmService $lastFmService)
    {
        $this->lastFmService = $lastFmService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all artists from the Last.fm API using $this->lastFmService
        $artists = $this->lastFmService->getAllArtists();

        // Return the retrieved artists
        return response()->json($artists);

    }

    public function getTrackInfo($artist, $track)
    {
        // Retrieve track information from the Last.fm API using $this->lastFmService
        $trackInfo = $this->lastFmService->getTrackInfo($artist, $track);

        // Return the retrieved track information
        return response()->json($trackInfo);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Create a new artist in the Last.fm API using $this->lastFmService
        $createdArtist = $this->lastFmService->createArtist($validatedData);

        // Return the created artist
        return response()->json($createdArtist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve a specific artist from the Last.fm API using $this->lastFmService
        $artist = $this->lastFmService->getArtist($id);

        // If the artist is not found, return an error response
        if (!$artist) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        // Return the retrieved artist
        return response()->json($artist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Update a specific artist in the Last.fm API using $this->lastFmService
        $updatedArtist = $this->lastFmService->updateArtist($id, $validatedData);

        // If the artist is not found, return an error response
        if (!$updatedArtist) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        // Return the updated artist
        return response()->json($updatedArtist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete a specific artist from the Last.fm API using $this->lastFmService
        $deleted = $this->lastFmService->deleteArtist($id);

        // If the artist is not found, return an error response
        if (!$deleted) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'Artist deleted']);
    }

    /**
     * Search Data the specified resource from storage.
     */

    public function searchArtist(Request $request)
    {
        $searchTerm = $request->input('name');

        // Search for artists in the Last.fm API using $this->lastFmService
        $results = $this->lastFmService->searchArtist($searchTerm);

        // Process and return the search results
        return response()->json(['artists'=>$results]);
    }

    public function favoriteArtist(Request $request)
    {
        $userId = $request->user()->id;
        $artistName = $request->input('artist_name');

        $artistInfo = $this->lastFmService->getArtist($artistName);

        if (!$artistInfo) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        $favoriteArtist = FavoriteArtist::create([
            'user_id' => $userId,
            'artist_name' => $artistName,
            'artist_info' => json_encode($artistInfo),
        ]);

        return response()->json(['favorite_artist' => $favoriteArtist], 201);
    }

    public function getFavoriteArtists(Request $request)
    {
        $userId = $request->user()->id;

        $favoriteArtists = FavoriteArtist::where('user_id', $userId)->get();

        return response()->json(['favorite_artists' => $favoriteArtists]);
    }

    public function unfavoriteArtist(Request $request, $id)
    {
        $userId = $request->user()->id;

        $favoriteArtist = FavoriteArtist::where('user_id', $userId)->findOrFail($id);
        $favoriteArtist->delete();

        return response()->json(['message' => 'Artist has been removed from favorites']);
    }
}
