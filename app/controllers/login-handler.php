<?php

include '../models/db.php';

$pdo = new DatabaseHandler();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if ($pdo->verifyUser($username, $password)) {
        $_SESSION['user'] = $username; // Start user session
        header('Location: /'); // Redirect to a dashboard or another protected page
    } else {
        $_SESSION['error'] = 'Invalid credentials'; // Store error message in session to display later
        header('Location: /login.php');
    }
    exit;
}
?>
