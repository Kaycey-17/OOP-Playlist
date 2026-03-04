<?php
include __DIR__ . '/../repository/Playlist/PlaylistRepository.php';

$playlists = [];
$fetchError = null;

try {
  $repo = new PlaylistRepository();
  $playlists = $repo->get();
} catch (Throwable $exception) {
  $fetchError = $exception->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Playlist</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
<div class="container">

<?php if (($_GET['status'] ?? '') === 'success') { ?>
<div class="row mt-3">
  <div class="alert alert-success">Playlist created successfully.</div>
</div>
<?php } ?>

<?php if ($fetchError !== null) { ?>
<div class="row mt-3">
  <div class="alert alert-danger">
    Failed to load Playlist: <?= htmlspecialchars($fetchError, ENT_QUOTES, 'UTF-8') ?>
  </div>
</div>
<?php } ?>

<div class="row mt-5">
<div class="col-12 d-flex justify-content-between align-items-center">
  <h2 class="fw-bold mb-0">Music Playlist</h2>
  <a class="btn btn-primary" href="/Playlist/views/create_playlist.php">
    Add Playlist
  </a>
</div>
</div>

<div class="row mt-4">
<div class="col-12">
<table class="table table-striped table-bordered">
<thead>
<tr>
  <th>Title</th>
  <th>Artist</th>
  <th>Genre</th>
</tr>
</thead>

<tbody>
<?php if (count($playlists) === 0) { ?>
<tr>
  <td colspan="3" class="text-center">No playlists yet.</td>
</tr>
<?php } else { ?>
<?php foreach ($playlists as $playlist) { ?>
<tr>
  <td><?= htmlspecialchars($playlist['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
  <td><?= htmlspecialchars($playlist['artist'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
  <td><?= htmlspecialchars($playlist['genre'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>

</table>
</div>
</div>

</div>
</body>
</html>