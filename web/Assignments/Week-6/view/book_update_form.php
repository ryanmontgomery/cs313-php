<?php include'view/_header.php'; ?>

<h2>Update Book</h2>
<div id="update_book" class="dashboard_section">
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update_book">
        <input type="hidden" name="book_id" value="<?php echo $book_id;?>">
        <label for="update_author_id">Author ID:</label>
        <input type="number" name="author_id" value="<?php echo $author_id;?>">
        <label for="update_title">Title:</label>
        <input id="update_title" type="text" name="title" value="<?php echo $title; ?>" required><br>
        <label for="update_published_date">Published (YYYY-MM-DD):</label>
        <input id="update_published_date" type="text" name="published_date" value="<?php echo $published_date; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</div>

<?php include'view/_footer.php'; ?>