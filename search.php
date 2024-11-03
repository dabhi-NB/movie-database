<?php
// search.php
require 'config.php';

$searchResults = [];
if (isset($_GET['query'])) {
    $query = urlencode($_GET['query']);
    $searchResults = fetchFromTMDb("/search/movie&query=$query")['results'] ?? [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Movies</h1>
        <nav><a href="index.php">Home</a> | <a href="favorites.php">Favorites</a></nav>
    </header>

    <form action="search.php" method="get">
        <input type="text" name="query" placeholder="Search for a movie..." required>
        <button type="submit">Search</button>
    </form>

    <div class="movies">
        <?php foreach ($searchResults as $movie): ?>
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
