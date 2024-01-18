<?php
include '../app/models/db.php';
$pdo = new DatabaseHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['project_id'] ?? null;
    $projectTitle = $_POST['project_title'] ?? '';
    $projectDescription = $_POST['project_description'] ?? '';

    // Validate input data
    if ($projectId && is_numeric($projectId) && !empty($projectTitle) && !empty($projectDescription)) {
        // Function to update project by ID
        $pdo->updateProject($projectId, $projectTitle, $projectDescription);
        // Redirect back to the admin page or display a confirmation message
        header('Location: /admin'); // Replace 'admin-page.php' with your actual admin page
        exit;
    } else {
        // Handle invalid input or display an error message
        echo "Invalid request";
        exit;
    }
}
?>
