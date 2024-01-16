<?php
include '../app/models/db.php';
$pdo = new DatabaseHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $skillId = $_POST['skill_id'] ?? null;
    $skillName = $_POST['skill_name'] ?? '';
    $skillImage = $_POST['skill_image'] ?? '';

    // Perform validation as necessary

    if ($skillId) {
        // Update the skill in the database
        $pdo->updateSkill($skillId, $skillName, $skillImage);
        // Redirect back or handle the response
        header('Location: /admin');
        exit;
    }
}