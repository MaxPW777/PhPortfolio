<a id="homeBtn" href="/">HOME</a>
<content>
    <main>
        <?php
        include '../app/models/db.php';
        $pdo = new DatabaseHandler();
        $skills = $pdo->fetchAllSkills();

        foreach ($skills as $skill) {
            echo '<div class="skill">';
            echo '<div class="title-image">';
            echo '<img src="assets/' . htmlspecialchars($skill['image']) . '" alt="' . htmlspecialchars($skill['SkillName']) . '">';
            echo '<h3>' . htmlspecialchars($skill['SkillName']) . '</h3>';
            echo '</div>';
            echo '<div class="projects">';
            // Fetch and display projects related to this skill
            $projects = $pdo->fetchProjectsBySkillId($skill['SkillID']);
            foreach ($projects as $project) {
                echo '<div class="project">';
                echo '<h4>' . htmlspecialchars($project['Title']) . '</h4>';
                echo '<p>' . htmlspecialchars($project['Description']) . '</p>';
                if ($project['Image']) {
                    echo '<img class="project-image" src="assets/project-images/' . htmlspecialchars($project['Image']) . '" alt="' . htmlspecialchars($project['Title']) . '">';
                } else {
                    echo "<h3>image not available</h3>";
                }
                echo '</div> <hr />'; // End of project div
            }

            echo '</div>';

            echo '</div>'; // End of skill div
        }
        ?>
    </main>


</content>