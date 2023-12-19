<?php

include '../includes/db.php';

$pdo = new DatabaseHandler();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $pdo->insertContact($name, $email, $message);

    // Redirect back to the contact page or display a success message
    header('Location: /contact');
    exit;
}

?>
