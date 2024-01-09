<h1>Maximilian PINDER-WHITE</h1>
<h2>BLOG</h2>
<main>

    <div class="content">
        <?php
    include '../app/models/db.php';
    $pdo = new DatabaseHandler();
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
<?php
if ($_SESSION['user'] = 'max') {
    echo "<div class='Sidebar'></div>";
}
?>
</main>