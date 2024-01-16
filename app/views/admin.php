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
            <img src="assets/{$skill['image']}" alt="{$skill['SkillName']}">
            <a href="projects.php?skillId={$skill['SkillID']}">{$skill['SkillName']}</a>
            <form method="POST" action="delete-skill">
                <input type="hidden" name="skill_id" value="{$skill['SkillID']}">
                <input type="submit" value="DELETE">
            </form>
            <button onclick="openDialog('dialog{$skill['SkillID']}')">UPDATE</button>
            <dialog id="dialog{$skill['SkillID']}">
                <form method="POST" action="update-skill">
                    <input type="hidden" name="skill_id" value="{$skill['SkillID']}">
                    <input type="text" name="skill_name" value="{$skill['SkillName']}">
                    <input type="text" name="skill_image" value="{$skill['image']}">
                    <input type="submit" value="Submit">
                </form>
                <button onclick="closeDialog('dialog{$skill['SkillID']}')" autofocus>Close</button>
            </dialog>
        </div>
SKILL;
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