<?php
include 'view/_header.php';
?>

<div id="search_author" class="dashboard_section">
    <h2>Search For Authors</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="search_author">
        <label for="search_last_name">Last Name:</label>
        <input id="search_last_name" type="text" name="last_name" required>
        <input type="submit" value="Search">
    </form>
</div>

<div id="add_author" class="dashboard_section">
    <h2>New Author</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_author">
        <label for="new_first_name">First Name:</label>
        <input id="new_first_name" type="text" name="first_name" required><br>
        <label for="new_last_name">Last Name:</label>
        <input id="new_last_name" type="text" name="last_name" required><br>
        <label for="new_bio">Bio:</label>
        <textarea id="new_bio" name="bio"></textarea><br>
        <input type="submit" value="Add">
    </form>
</div>

<?php
include 'view/_footer.php';
?>