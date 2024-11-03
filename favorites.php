<?php
// favorites.php
session_start();
require 'config.php';

$favorites = $_SESSION['favorites'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorite Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Favorite Movies</h1>

    <?php if (empty($favorites)): ?>
        <p>No favorite movies saved yet.</p>
    <?php else: ?>
        <div class="movies">
            <?php foreach ($favorites as $movie): ?>
                <div class="movie">
                    <h3><?php echo $movie['title']; ?></h3>
                    <img src="https://image.tmdb.org/t/p/w200<?php echo $movie['poster_path']; ?>" alt="<?php echo $movie['title']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
