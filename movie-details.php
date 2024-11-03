<?php
// movie-details.php
require 'config.php';

if (!isset($_GET['id'])) {
    die("Movie ID not specified.");
}

$movieId = $_GET['id'];
$movieDetails = fetchFromTMDb("/movie/$movieId");
$movieVideos = fetchFromTMDb("/movie/$movieId/videos")['results'] ?? [];
$trailer = current(array_filter($movieVideos, fn($v) => $v['type'] === 'Trailer'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $movieDetails['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $movieDetails['title']; ?></h1>
    <img src="https://image.tmdb.org/t/p/w300<?php echo $movieDetails['poster_path']; ?>" alt="<?php echo $movieDetails['title']; ?>">
    <p><?php echo $movieDetails['overview']; ?></p>

    <?php if ($trailer): ?>
        <h3>Trailer</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $trailer['key']; ?>" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?>
</body>
</html>
