<a id="homeBtn" href="/">HOME</a>
<main>
    <?php
    include_once '../includes/db.php';
    $stmt = $pdo->prepare('SELECT * FROM skills');
    $stmt->execute();
    $skills = $stmt->fetchAll();

    foreach ($skills as $skill) {
        echo '<div class="skill">';
        echo '<img src="assets/github-mark-white.svg" alt="">';
        echo '<h3>' . $skill['SkillName'] . '</h3>';
        echo '</div>';
    }
    ?>

    
</main>