<?php

class CreatePlaylistDTO 
{
  public string $title;
  public string $artist;
  public string $genre;

  public function __construct(string $title, string $artist, string $genre)
  {
    $this->title = $title;
    $this->artist = $artist;
    $this->genre = $genre;
  }
}