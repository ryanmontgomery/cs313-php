<?php
include 'view/_header.php';
?>

<h2><?php echo $author['first_name'] . ' ' . $author['last_name']; ?></h2>
<p><?php echo $author['bio']; ?></p>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="author_update_form">
    <input type="hidden" name="author_id" value="<?php echo $author['author_id']; ?>">
    <input type="hidden" name="first_name" value="<?php echo $author['first_name']; ?>">
    <input type="hidden" name="last_name" value="<?php echo $author['last_name']; ?>">
    <input type="hidden" name="bio" value="<?php echo $author['bio']; ?>">
    <input type="submit" value="Edit">
</form>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="delete_author">
    <input type="hidden" name="author_id" value="<?php echo $author['author_id']; ?>">
    <input type="submit" value="Delete">
</form>
<hr>

<h2>Books</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Published Date</th>
        <th></th>
    </tr>

<?php
foreach ($authors_books as $book) {
    echo "<tr>";
        echo "<td><a href=index.php?action=get_book&book_id=" . $book['book_id'] . ">" . $book['book_id'] . "</a></td>";
        echo "<td>" . $book['title'] . "</td>";
        echo "<td>" . $book['published_date'] . "</td>";
        echo "<td>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='get_book'>";
        echo "<input type='hidden' name='book_id' value='" . $book['book_id'] . "'>";
        echo "<input type='submit' value='Details'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
}
?>
</table>

<?php
include 'view/_footer.php';
?>