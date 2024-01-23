<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album
{
    protected $name;
    protected $artist;
    protected $releaseDate;
    protected $trackList;

    public function __construct($name, $artist, $releaseDate, $trackList)
    {
        $this->name = $name;
        $this->artist = $artist;
        $this->releaseDate = $releaseDate;
        $this->trackList = $trackList;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function getTrackList()
    {
        return $this->trackList;
    }
}
