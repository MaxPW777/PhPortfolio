<a id="homeBtn" href="/">HOME</a>
<main>
    <?php
    include '../app/models/db.php';
    $pdo = new DatabaseHandler();
    $skills = $pdo->fetchAllSkills();

    foreach ($skills as $skill) {
        echo '<div class="skill">';
        echo '<img src="assets/' . htmlspecialchars($skill['image']) . '" alt="' . htmlspecialchars($skill['image']) . '">'; // Adjust the image source as needed
        echo '<h3>' . htmlspecialchars($skill['SkillName']) . '</h3>'; // Use htmlspecialchars for security
        echo '</div>';
    }
    ?>


</main>