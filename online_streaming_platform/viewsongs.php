<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$artist_id = $_GET['artist_id'] ?? null;
$songs = getSongsByArtist($pdo, $artist_id);
$artist = getArtistById($pdo, $artist_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs by <?php echo $artist['name']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Songs by <?php echo $artist['name']; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songs as $song): ?>
                <tr>
                    <td><?php echo $song['title']; ?></td>
                    <td><?php echo $song['release_date']; ?></td>
                    <td><?php echo $song['genre']; ?></td>
                    <td>
                        <a href="editSong.php?id=<?php echo $song['id']; ?>">Edit</a>
                        <a href="deleteSong.php?id=<?php echo $song['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="addsong.php?artist_id=<?php echo $artist_id; ?>" class="add-button">Add New Song</a>
        <a href="index.php" class="back-button">Go Back</a>
    </div>
</body>
</html>
