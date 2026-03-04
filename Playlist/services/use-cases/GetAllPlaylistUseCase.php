<?php

include __DIR__ . '/../../repository/Playlist/PlaylistRepository.php';

header('Content-Type: application/json; charset=utf-8');

try {
  $repo = new PlaylistRepository();
  $friends = $repo->get();
  echo json_encode($friends, JSON_UNESCAPED_UNICODE);
} catch (Throwable $exception) {
  http_response_code(500);
  echo json_encode([
    'error' => 'Failed to load friends.',
  ], JSON_UNESCAPED_UNICODE);
}

?>
