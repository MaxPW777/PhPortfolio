<div class="titles">
    <h2>Maximilian PINDER-WHITE</h2>
    <h2>BLOG</h2>

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
    <?php
    if ($_SESSION['user'] = 'max') {
        echo "<div class='Sidebar'>
    <form method='POST' action='submit-post'>
        <input type='text' name='Title' placeholder='title'>
        <input type='text' name='Content' placeholder='Message'></input>
        <input type='submit' value='Send'>
    </form>
    </div>";
    }
    ?>
</main>