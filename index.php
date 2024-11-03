<?php
// index.php
require 'config.php';

$topRatedMovies = fetchFromTMDb("/movie/top_rated")['results'] ?? [];
$upcomingMovies = fetchFromTMDb("/movie/upcoming")['results'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Movie Database</h1>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="search.php">Search</a> | 
            <a href="favorites.php">Favorites</a>
        </nav>
    </header>

    <h2>Top-Rated Movies</h2>
    <div class="movies">
        <?php foreach ($topRatedMovies as $movie): ?>
            <div class="movie">
                <h3><?php echo $movie['title']; ?></h3>
                <a href="movie-details.php?id=<?php echo $movie['id']; ?>">
                    <img src="https://image.tmdb.org/t/p/w200<?php echo $movie['poster_path']; ?>" alt="<?php echo $movie['title']; ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Upcoming Movies</h2>
    <div class="movies">
        <?php foreach ($upcomingMovies as $movie): ?>
            <div class="movie">
                <h3><?php echo $movie['title']; ?></h3>
                <a href="movie-details.php?id=<?php echo $movie['id']; ?>">
                    <img src="https://image.tmdb.org/t/p/w200<?php echo $movie['poster_path']; ?>" alt="<?php echo $movie['title']; ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
