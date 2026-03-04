<?php

interface PlaylistRepositoryInterface
{
  public function store(string $title, string $artist, string $genre): void;
  public function get(): array;
}



?>
