<div class="titles">
    <h2>Maximilian PINDER-WHITE</h2>
    <a href="/">BLOG</a>

</div>
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
    
</main>