<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (isset($_GET['id'])) {
    $song_id = $_GET['id'];
    deleteSong($pdo, $song_id);
    $artist_id = $_GET['artist_id'];
    header("Location: viewsongs.php?artist_id=" . $artist_id);
    exit;
}
?>
