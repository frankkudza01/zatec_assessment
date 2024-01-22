<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAlbum extends Model
{
    use HasFactory;

    protected $table='favorite_albums';

    protected $fillable = ['user_id', 'album_name', 'artist_name', 'album_info'];

    protected $casts = [
        'album_info' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
