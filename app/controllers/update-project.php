<?php
include '../app/models/db.php';
$pdo = new DatabaseHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['project_id'] ?? null;
    $projectTitle = $_POST['project_title'] ?? '';
    $projectDescription = $_POST['project_description'] ?? '';
    $projectImage = $_POST['project_image'] ?? '';  // Assuming the form will send an image file name

    // Validate input data
    if ($projectId && is_numeric($projectId) && !empty($projectTitle) && !empty($projectDescription)) {
        // Validate the projectImage if necessary

        // Function to update project by ID, including the image
        $pdo->updateProject($projectId, $projectTitle, $projectDescription, $projectImage);

        // Redirect back to the admin page or display a confirmation message
        header('Location: /admin'); // Make sure this is the correct path to your admin page
        exit;
    } else {
        // Handle invalid input or display an error message
        echo "Invalid request";
        exit;
    }
}
?>
