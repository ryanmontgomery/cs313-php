<?php
include 'view/_header.php';
?>

<h2>Login</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="authenticate">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Login">

    <?php echo $login_error; ?>
</form>

<?php
include 'view/_footer.php';
?>