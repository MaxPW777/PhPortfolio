<h1>Maximilian PINDER-WHITE</h1>
<p>
    <?php

    $test = crypt("franbkdv", "PHPortfolio");
    echo $test . "\n";
    if (password_verify('franbkdv', "PHqlx5YgF.XFk" )) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    } ?>
</p>
<grid>
    <a href="/info" class="Presentation">Presentation</a>
    <a href="/skills" class="Skills">Skills</a>
    <a href="/blog" class="Blog">Blog</a>
    <a href="https://github.com/MaxPW777" target="_blank" class="Github">
        <img id="githubImage" src="assets\github-mark-white.svg" alt="">
    </a>
    <a href="/contact" class="Contact">Contact</a>
</grid>