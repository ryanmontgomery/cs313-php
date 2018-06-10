<?php include'view/_header.php'; ?>

<h2>Update Author</h2>
<div id="update_author" class="dashboard_section">
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update_author">
        <input type="hidden" name="author_id" value="<?php echo $author_id;?>">
        <label for="update_first_name">First Name:</label>
        <input id="update_first_name" type="text" name="first_name" value="<?php echo $first_name; ?>" required><br>
        <label for="update_last_name">Last Name:</label>
        <input id="update_last_name" type="text" name="last_name" value="<?php echo $last_name; ?>" required><br>
        <label for="update_bio">Bio:</label>
        <textarea id="update_bio" name="bio"><?php echo $bio; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</div>

<?php include'view/_footer.php'; ?>