<?php
include 'view/_header.php';
?>

<h2>Book Details</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Published Date</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td><?php echo $book['book_id']; ?></td>
        <?php echo "<td><a href=index.php?action=get_author&author_id=" . $book['author_id'] . ">" . $book['first_name'] . " " . $book['last_name'] . "</a></td>"; ?>
        <td><?php echo $book['title']; ?></td>
        <td><?php echo $book['published_date']; ?></td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="book_update_form">
                <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                <input type="hidden" name="author_id" value="<?php echo $book['author_id']; ?>">
                <input type="hidden" name="title" value="<?php echo $book['title']; ?>">
                <input type="hidden" name="published_date" value="<?php echo $book['published_date']; ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="delete_book">
                <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
</table>

<?php
include 'view/_footer.php';
?>