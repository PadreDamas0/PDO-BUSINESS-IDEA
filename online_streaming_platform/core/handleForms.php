<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertArtistBtn'])) {
    $query = insertArtist($pdo, $_POST['name'], $_POST['email'], $_POST['genre'], $_POST['signing_date']);
    header("Location: index.php");
}

if (isset($_POST['editArtistBtn'])) {
    $query = updateArtist($pdo, $_POST['id'], $_POST['name'], $_POST['email'], $_POST['genre'], $_POST['signing_date']);
    header("Location: index.php");
}

if (isset($_POST['deleteArtistBtn'])) {
    $query = deleteArtist($pdo, $_POST['id']);
    header("Location: index.php");
}

if (isset($_POST['insertSongBtn'])) {
    $query = insertSong($pdo, $_POST['artist_id'], $_POST['title'], $_POST['release_date'], $_POST['genre']);
    header("Location: viewsongs.php?artist_id=" . $_POST['artist_id']);
}

if (isset($_POST['editSongBtn'])) {
    $query = updateSong($pdo, $_POST['id'], $_POST['title'], $_POST['release_date'], $_POST['genre']);
    header("Location: viewsongs.php?artist_id=" . $_POST['artist_id']);
}

if (isset($_POST['deleteSongBtn'])) {
    $query = deleteSong($pdo, $_POST['id']);
    header("Location: viewsongs.php?artist_id=" . $_POST['artist_id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_artist'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $signing_date = $_POST['signing_date'];

    updateArtist($pdo, $id, $name, $email, $genre, $signing_date); // Call the update function
    header("Location: index.php"); 
    exit();

}
?>
