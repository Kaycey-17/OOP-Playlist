<?php

include __DIR__ . '/../dto/CreatePlaylistDTO.php';
include __DIR__ . '/../../repository/Playlist/PlaylistRepository.php';

$title  = $_POST['title'] ?? "";
$artist = $_POST['artist'] ?? "";
$genre  = $_POST['genre'] ?? "";

$playlist = new CreatePlaylistDTO($title, $artist, $genre);

$repo = new PlaylistRepository();
$repo->store($playlist->title, $playlist->artist, $playlist->genre);

header("Location: ../../views/home.php?status=success");
exit;