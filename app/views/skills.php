<a id="homeBtn" href="/">HOME</a>
<content>
    <main>
    <?php
    include '../app/models/db.php';
    $pdo = new DatabaseHandler();
    $skills = $pdo->fetchAllSkills();

    foreach ($skills as $skill) {
        echo '<div class="skill">';
        echo '<img src="assets/' . htmlspecialchars($skill['image']) . '" alt="' . htmlspecialchars($skill['SkillName']) . '">';
        echo '<a href="projects.php?skillId=' . htmlspecialchars($skill['SkillID']) . '">' . htmlspecialchars($skill['SkillName']) . '</a>';
        echo '</div>';
    }
?>


</main>

</content>