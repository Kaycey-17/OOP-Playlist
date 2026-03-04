<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Music Playlist</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
<div class="container">

<?php if (($_GET['status'] ?? '') === 'success') { ?>
<div class="row mt-3">
  <div class="alert alert-success">Playlist created successfully.</div>
</div>
<?php } ?>

<div class="row mt-5 text-center">
  <h2 class="fw-bold">Create Playlist</h2>
</div>

<div class="row mt-5">
<form action="../services/use-cases/CreatePlaylistUseCase.php" method="post">

<div class="form-group">
<label class="form-label">Song Title</label>
<input class="form-control" type="text" name="title" required />
</div>

<div class="form-group">
<label class="form-label">Artist</label>
<input class="form-control" type="text" name="artist" required />
</div>

<div class="form-group">
<label class="form-label">Genre</label>
<input class="form-control" type="text" name="genre" required />
</div>

<div class="text-center mt-5">
<button type="submit" class="btn btn-primary">Add to Playlist</button>
</div>

</form>
</div>
</div>
</body>
</html>