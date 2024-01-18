<?php
include '../app/models/db.php';
$pdo = new DatabaseHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['project_id'] ?? null;

    // Validate projectId
    if ($projectId && is_numeric($projectId)) {
        // Function to delete project by ID
        $pdo->deleteProject($projectId);
        // Redirect back to the admin page or display a confirmation message
        header('Location: /admin'); // Replace 'admin-page.php' with your actual admin page
        exit;
    } else {
        // Handle invalid projectId or display an error message
        echo "Invalid request";
        exit;
    }
}
?>
