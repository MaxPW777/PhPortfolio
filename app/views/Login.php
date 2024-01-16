<main>
    <h1>Login</h1>
    <form method="post" action="login-handler">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
        <?php
        $error = $_GET["error"];
        var_dump($_GET);
        if ($error === 'invalid_credentials') {
            echo "pornhub";
        }
        ?>
    </form>
</main>