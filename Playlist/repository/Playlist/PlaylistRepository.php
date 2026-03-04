<?php

include __DIR__ . '/PlaylistRepositoryInterface.php';

class PlaylistRepository implements PlaylistRepositoryInterface
{
  private mysqli $conn;

  public function __construct() {
    include __DIR__ . '/../../config/database.php';
    $this->conn = $conn;
  }

  public function store(string $title, string $artist, string $genre): void
  {
    $stmt = $this->conn->prepare(
      "INSERT INTO playlists(title, artist, genre) VALUES (?, ?, ?)"
    );

    if ($stmt === false) {
      throw new RuntimeException("Failed to prepare playlist insert.");
    }

    $stmt->bind_param("sss", $title, $artist, $genre);

    if ($stmt->execute() === false) {
      throw new RuntimeException("Failed to insert playlist.");
    }

    $stmt->close();
  }

  public function get(): array
  {
    $res = $this->conn->query("SELECT * FROM playlists");

    if ($res === false) {
      throw new RuntimeException("Failed to fetch playlists.");
    }

    return $res->fetch_all(MYSQLI_ASSOC);
  }
}