<?php
include 'view/_header.php';
?>

<h2>Search Results</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Published Date</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td><a href=index.php?action=get_book&book_id=" . $book['book_id'] . ">" . $book['book_id'] . "</a></td>";
        echo "<td><a href=index.php?action=get_author&author_id=" . $book['author_id'] . ">" . $book['first_name'] . " " . $book['last_name'] . "</a></td>";
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