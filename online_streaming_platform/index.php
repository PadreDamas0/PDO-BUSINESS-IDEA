<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$artists = getAllArtists($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Streaming Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Davidify Streaming Platform</h1>
        <h2>Artists</h2>
        <a href="addartist.php">Add Artist</a>
        <div class="artists">
            <?php foreach ($artists as $artist): ?>
                <div class="artist-card">
                    <h3><?php echo htmlspecialchars($artist['name']); ?></h3>
                    <p>Email: <?php echo htmlspecialchars($artist['email']); ?></p>
                    <p>Genre: <?php echo htmlspecialchars($artist['genre']); ?></p>
                    <p>Signing Date: <?php echo htmlspecialchars($artist['signing_date']); ?></p>
                    <a href="viewsongs.php?artist_id=<?php echo $artist['id']; ?>">View Songs</a>
                    <a href="editartist.php?id=<?php echo $artist['id']; ?>">Edit</a>
                    <a href="deleteartist.php?id=<?php echo $artist['id']; ?>">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
