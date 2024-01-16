<?php
if (!isset($_SESSION['admin'])) {
    // Redirect to login page or display a message
    header('Location: login.php');
    exit;
}

include '../app/models/db.php';
$pdo = new DatabaseHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $skillId = $_POST['skill_id'] ?? null;
    
    // Validate skillId
    if ($skillId && is_numeric($skillId)) {
        // Function to delete skill by ID
        $pdo->deleteSkill($skillId);
        // Redirect back to the skills page or a confirmation page
        header('Location: /skills'); // Replace 'skills.php' with the actual page
        exit;
    } else {
        // Handle invalid skillId or display an error message
        // For example, redirect to an error page or show a message
        echo "Invalid request";
        exit;
    }
}
// Handle other invalid requests or redirect
?>
