<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (isset($_GET['id'])) {
    $artist_id = $_GET['id'];
    deleteArtist($pdo, $artist_id);
    header("Location: index.php");
    exit;
}
?>
