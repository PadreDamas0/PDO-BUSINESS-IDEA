<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $signing_date = $_POST['signing_date'];


    updateArtist($pdo, $id, $name, $email, $genre, $signing_date);


    header("Location: index.php");
    exit;
}


$artist_id = $_GET['id'];
$artist = getArtistById($pdo, $artist_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Artist</title>
</head>
<body>
    <h1>Edit Artist</h1>
    <form action="editartist.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $artist['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $artist['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $artist['email']; ?>" required><br>
        Genre: <input type="text" name="genre" value="<?php echo $artist['genre']; ?>" required><br>
        Signing Date: <input type="date" name="signing_date" value="<?php echo $artist['signing_date']; ?>" required><br>
        <input type="submit" value="Update Artist">
    </form>
    <a href="index.php">Back to Artists</a>
</body>
</html>
