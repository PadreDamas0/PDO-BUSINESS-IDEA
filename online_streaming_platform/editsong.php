<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';


if (isset($_GET['id'])) {
    $song_id = $_GET['id'];

 
    $song = getSongById($pdo, $song_id);


    if (!$song) {
        header("Location: index.php");
        exit;
    }


    $artists = getAllArtists($pdo);
} else {
    header("Location: index.php");
    exit;
}


function getSongById($pdo, $song_id) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE id = ?");
    $stmt->execute([$song_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];
    $artist_id = $_POST['artist_id'];

 
    updateSong($pdo, $song_id, $artist_id, $title, $release_date, $genre);
    header("Location: viewsongs.php?artist_id=" . $artist_id); 
}


function updateSong($pdo, $song_id, $artist_id, $title, $release_date, $genre) {
    $stmt = $pdo->prepare("UPDATE songs SET artist_id = ?, title = ?, release_date = ?, genre = ? WHERE id = ?");
    $stmt->execute([$artist_id, $title, $release_date, $genre, $song_id]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-button {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Song</h2>
        <form action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($song['title']); ?>" required>

            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" value="<?php echo htmlspecialchars($song['release_date']); ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($song['genre']); ?>" required>

            <label for="artist_id">Artist:</label>
            <select id="artist_id" name="artist_id" required>
                <?php foreach ($artists as $artist): ?>
                    <option value="<?php echo htmlspecialchars($artist['id']); ?>" <?php echo ($artist['id'] == $song['artist_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($artist['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Update Song">
        </form>
        <div class="back-button">
            <a href="viewsongs.php?artist_id=<?php echo htmlspecialchars($song['artist_id']); ?>">Back to Songs</a>
        </div>
    </div>
</body>
</html>
