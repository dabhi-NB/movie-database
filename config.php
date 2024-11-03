<?php
// config.php

define('TMDB_API_KEY', '3bbdfbf7f9c7e56bd1a8e7823f00ee3d');

// Function to fetch data from TMDb API with error handling and longer timeout
function fetchFromTMDb($endpoint) {
    $url = "https://api.themoviedb.org/3" . $endpoint . "?api_key=" . TMDB_API_KEY;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Increased timeout
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); // Force IPv4

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL Error: ' . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);
    return json_decode($output, true);
}
?>
