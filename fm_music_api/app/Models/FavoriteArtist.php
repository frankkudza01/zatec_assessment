<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteArtist extends Model
{
    use HasFactory;

    protected $table='favorite_artists';
    protected $fillable = ['user_id', 'artist_name', 'artist_info'];
    
    protected $casts = [
        'artist_info' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
