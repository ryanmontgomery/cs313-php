<?php
include 'view/_header.php';
?>

<div id="search_book" class="dashboard_section">
    <h2>Search For Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="search_books">
        <label for="search_title">Title:</label>
        <input id="search_title" type="text" name="title" required>
        <input type="submit" value="Search">
    </form>
</div>

<div id="add_book" class="dashboard_section">
    <h2>New Book</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_book">
        <label for="new_author_id">Author ID:</label>
        <input id="new_author_id" type="text" name="author_id" required><br>
        <label for="new_title">Title:</label>
        <input id="new_title" type="text" name="title" required><br>
        <label for="new_published_date">Published (YYYY-MM-DD):</label>
        <input id="new_published_date" type="text" name="published_date"><br>
        <input type="submit" value="Add">
    </form>
</div>

<?php
include 'view/_footer.php';
?>