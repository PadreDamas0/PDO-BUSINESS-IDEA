<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artist_id = $_POST['artist_id'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];

    addSong($pdo, $artist_id, $title, $release_date, $genre);
    
 
    header("Location: viewsongs.php?artist_id=" . $artist_id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Song</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add a New Song</h2>
        <form action="" method="POST">
            <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($_GET['artist_id']); ?>">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="release_date">Release Date:</label>
            <input type="date" name="release_date" required>
            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>
            <button type="submit">Add Song</button>
            <a href="viewsongs.php?artist_id=<?php echo htmlspecialchars($_GET['artist_id']); ?>" class="back-button">Go Back</a>
        </form>
    </div>
</body>
</html>
