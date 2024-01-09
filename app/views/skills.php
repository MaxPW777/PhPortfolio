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
        echo '<div></div>';
        echo '</div>';
    }
    ?>

</main>
<?php
    if (isset($_SESSION['admin'])){
        echo "<div class='Sidebar'>
    <form method='POST' action='submit-post'>
        <input type='text' name='Title' placeholder='title'>
        <input type='text' name='Content' placeholder='Message'></input>
        <input type='submit' value='Send'>
    </form>
    </div>";
    }
    ?>