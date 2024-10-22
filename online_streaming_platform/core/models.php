<?php

require_once __DIR__ . '/dbConfig.php'; //used a magic constant to provide sure path


function getAllArtists($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM artists");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function addArtist($pdo, $name, $email, $genre, $signing_date) {
    $stmt = $pdo->prepare("INSERT INTO artists (name, email, genre, signing_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $genre, $signing_date]);
}


function getSongsByArtist($pdo, $artist_id) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE artist_id = ?");
    $stmt->execute([$artist_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getArtistById($pdo, $artist_id) {
    $stmt = $pdo->prepare("SELECT * FROM artists WHERE id = ?");
    $stmt->execute([$artist_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function addSong($pdo, $artist_id, $title, $release_date, $genre) {
    $stmt = $pdo->prepare("INSERT INTO songs (artist_id, title, release_date, genre) VALUES (?, ?, ?, ?)");
    $stmt->execute([$artist_id, $title, $release_date, $genre]);
}


function updateArtist($pdo, $id, $name, $email, $genre, $signing_date) {
    $stmt = $pdo->prepare("UPDATE artists SET name = ?, email = ?, genre = ?, signing_date = ? WHERE id = ?");
    $stmt->execute([$name, $email, $genre, $signing_date, $id]);
}


function deleteArtist($pdo, $artist_id) {
    $stmt = $pdo->prepare("DELETE FROM artists WHERE id = ?");
    $stmt->execute([$artist_id]);
}


function deleteSong($pdo, $song_id) {
    $stmt = $pdo->prepare("DELETE FROM songs WHERE id = ?");
    $stmt->execute([$song_id]);
}
?>
