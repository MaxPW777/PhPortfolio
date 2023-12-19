<?php

include '../includes/db.php';

$pdo = new DatabaseHandler();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $pdo->verifyUser($name, $password);

    // Redirect back to the contact page or display a success message
    header('Location: /');
    exit;
}

?>
