<?php
if (!$_SESSION["admin"]) {
    header("Location: /");
}
include '../app/models/db.php';
$pdo = new DatabaseHandler();
?>

<header>
    <h3>Skills</h3>
    <h3>Messages</h3>
    <h3>Posts</h3>
</header>

<div class="skills">
    <?php
    $skills = $pdo->fetchAllSkills();
    foreach ($skills as $skill) {
        echo '<div class="skill">';
        echo '<img src="assets/' . htmlspecialchars($skill['image']) . '" alt="' . htmlspecialchars($skill['SkillName']) . '">';
        echo '<a href="projects.php?skillId=' . htmlspecialchars($skill['SkillID']) . '">' . htmlspecialchars($skill['SkillName']) . '</a>';
        echo '</div>';
    } ?>
</div>
<div class="messages">
    <?php
    $messages = $pdo->fetchAllMessages();
    foreach ($messages as $message) {
        echo '<div class="message">';
        echo '<p> ' . htmlspecialchars($message['Message']) . '</p>';
        echo '</div>';
    } ?>
</div>
<div class="posts">
<?php
        $skills = $pdo->fetchAllPosts();
        foreach ($skills as $skill) {
            echo '<div class="post">';
            echo '<h3>' . htmlspecialchars($skill['Title']) . '</h3>'; // Use htmlspecialchars for security
            echo '<p>' . htmlspecialchars($skill['Content']) . '</p>';
            echo '<p class="date">' . htmlspecialchars($skill['PublishedDate']) . '</p>';
            echo '</div>';
        }
        ?>
</div>