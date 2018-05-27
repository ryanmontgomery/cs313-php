<?php
include 'view/_header.php';
?>

<h2>Search Results</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Author ID</th>
        <th>Title</th>
        <th>Published Date</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>" . $book['book_id'] . "</td>";
        echo "<td>" . $book['author_id'] . "</td>";
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