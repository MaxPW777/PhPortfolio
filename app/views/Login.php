<main>
    <h1>Login</h1>
    <form method="post" action="login-handler"> <!-- Fixed action attribute -->
        <input type="text" name="username" placeholder="Username"> <!-- Added name attribute -->
        <input type="password" name="password" placeholder="Password"> <!-- Added name attribute -->
        <input type="submit" value="Login"> <!-- Changed button text to Login -->
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p>Error: Invalid credentials. Please try again.</p>
    <?php endif; ?>
</main>