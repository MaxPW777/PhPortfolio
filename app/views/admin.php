<?php
if (!$_SESSION["admin"]) {
    header("Location: /");
    exit;
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
        echo <<<SKILL
        <div class="skill">
            <div class="skill-name">
                <img src="assets/{$skill['image']}" alt="{$skill['SkillName']}">
                <h3>{$skill['SkillName']}</h3>
            </div>
            <div class="skill-buttons">
                <form method="POST" action="delete-skill">
                <input type="hidden" name="skill_id" value="{$skill['SkillID']}">
                <input type="submit" value="DELETE">
            </form>
            <button onclick="openDialog('updateSkillDialog{$skill['SkillID']}')">UPDATE</button>
            </div>
            <dialog id="updateSkillDialog{$skill['SkillID']}">
                <form method="POST" action="update-skill">
                <input type="hidden" name="skill_id" value="{$skill['SkillID']}">
                    <div class="update-input">
                        <label for="skill_name" class="update-label">skill name</label>
                        <input type="text" name="skill_name" value="{$skill['SkillName']}">
                    </div>
                    <div class="update-input">
                        <label for="skill-image" class="update-label">skill image link</label>
                        <input type="text" name="skill_image" value="{$skill['image']}">
                    </div>
                    <input type="submit" value="Submit">
                </form>
                <button onclick="closeDialog('updateSkillDialog{$skill['SkillID']}')" autofocus>Close</button>
            </dialog>

            <div class="projects">
            <h3>PROJECTS</h3>
SKILL;

        // Fetch and display projects related to this skill
        $projects = $pdo->fetchProjectsBySkillId($skill['SkillID']);
        foreach ($projects as $project) {
            echo <<<PROJECT
                <div class="project">
                    <h4>{$project['Title']}</h4>
                    <p>{$project['Description']}</p>
                    <div class="skill-buttons">
                        <form method="POST" action="delete-project">
                            <input type="hidden" name="project_id" value="{$project['ProjectID']}">
                            <input type="submit" value="DELETE">
                        </form>
                        <button onclick="openDialog('updateProjectDialog{$project['ProjectID']}')">UPDATE</button>
                    </div>
                    <dialog id="updateProjectDialog{$project['ProjectID']}">
                        <form method="POST" action="update-project">
                        <input type="hidden" name="project_id" value="{$project['ProjectID']}">
                            <div class="update-input">
                                <label for="skill-image" class="update-label">project title</label>
                                <input type="text" name="project_title" value="{$project['Title']}">
                            </div>
                            <div class="update-input">
                                <label for="skill-image" class="update-label">project description</label>
                                <input type="text" name="project_description" value="{$project['Description']}">
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                        <button onclick="closeDialog('updateProjectDialog{$project['ProjectID']}')" autofocus>Close</button>
                    </dialog>
                </div>
                <hr / >
PROJECT;
        }

        echo '</div></div>'; // Close projects and skill divs
    }
    ?>
</div>


<div class="messages">
    <?php
    $messages = $pdo->fetchAllMessages();
    foreach ($messages as $message) {
        echo <<<MESSAGE
        <div class="message">
            <div class="message-head">
                <p>{$message['Email']}</p>
                <h4>{$message['Name']}</h4>
            </div>
            <p>{$message['Message']}</p>
        </div>
MESSAGE;
    }
    ?>
</div>

<div class="posts">
    <form method="POST" action="submit-post">
        <div class="text-form">
            <input type="text" name="Title" placeholder="title">
            <input type="text" name="Content" placeholder="Message">
        </div>
        <input type="submit" value="Send">
    </form>
    <?php
    $posts = $pdo->fetchAllPosts();
    foreach ($posts as $post) {
        echo <<<POST
        <div class="post">
            <h3>{$post['Title']}</h3>
            <p>{$post['Content']}</p>
            <p class="date">{$post['PublishedDate']}</p>
        </div>
POST;
    }
    ?>
</div>