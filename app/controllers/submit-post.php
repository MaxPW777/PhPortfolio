<?php

include '../app/models/db.php';

$pdo = new DatabaseHandler();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = $_POST['Title'];
    $Content = $_POST['Content'];

    $pdo->insertPost($Title, $Content);

    // Redirect back to the post page or display a success message
    header('Location: /admin');
    exit;
}

?>
