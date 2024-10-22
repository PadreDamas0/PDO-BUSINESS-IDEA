<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $signing_date = $_POST['signing_date'];

    addArtist($pdo, $name, $email, $genre, $signing_date);
    header("Location: index.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add a New Artist</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>

            <label for="signing_date">Signing Date:</label>
            <input type="date" name="signing_date" required>

            <button type="submit">Add Artist</button>
            <a href="index.php" class="back-button">Go Back</a> 
        </form>
    </div>
</body>
</html>
