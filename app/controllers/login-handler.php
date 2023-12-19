<?php


include '../app/models/db.php'; // Make sure this path is correct

session_start(); // Start a session for login tracking

$pdo = new DatabaseHandler();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Changed 'name' to 'username' for clarity
    $password = $_POST['password'];

    if ($pdo->verifyUser($username, $password)) {
        $_SESSION['user'] = $username; // Store username in session
        header('Location: /'); // Redirect to homepage on success
        exit;
    } else {
        // Handle login failure
        // For example: redirect to login page with an error message
        header('Location: /login?error=invalid_credentials');
        exit;
    }
}
?>
