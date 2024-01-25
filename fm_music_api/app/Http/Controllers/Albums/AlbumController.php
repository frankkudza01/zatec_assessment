<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AlbumsService;
use App\Models\FavoriteAlbum;
class AlbumController extends Controller
{
    protected $albumsService;

    public function __construct(AlbumsService $albumsService)
    {
        $this->albumsService = $albumsService;
    }


    public function index()
    {
        try {
            $albums = $this->albumsService->getAllAlbums();
            return response()->json($albums);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        $albumName = $request->query('album_name');

        $albums = $this->albumsService->searchAlbums($albumName);

        return response()->json(['albums' => $albums]);
    }

    public function show(Request $request)
    {
        $albumName = $request->input('album_name');
        $artistName = $request->input('artist_name');

        $album = $this->albumsService->getAlbumInfo($albumName, $artistName);

        return response()->json($album);
    }

    
    public function favoriteAlbum(Request $request)
    {
        $userId = $request->user()->id;
        $albumName = $request->input('album_name');
        $artistName = $request->input('artist_name');

        $albumInfo = $this->albumsService->getAlbumInfo($albumName, $artistName);

        if (!$albumInfo) {
            return response()->json(['error' => 'Album not found'], 404);
        }

        $favoriteAlbum = FavoriteAlbum::create([
            'user_id' => $userId,
            'album_name' => $albumName,
            'artist_name' => $artistName,
            'album_info' => json_encode($albumInfo),
        ]);

        return response()->json(['favorite_album' => $favoriteAlbum], 201);
    }

    public function getFavoriteAlbums(Request $request)
    {
        $userId = $request->user()->id;

        $favoriteAlbums = FavoriteAlbum::where('user_id', $userId)->get();

        return response()->json(['favorite_albums' => $favoriteAlbums]);
    }

    public function unfavoriteAlbum(Request $request, $id)
    {
        $userId = $request->user()->id;

        $favoriteAlbum = FavoriteAlbum::where('user_id', $userId)->findOrFail($id);
        $favoriteAlbum->delete();

        return response()->json(['message' => 'Album has been removed from favorites']);
    }
}
