<?php
include 'view/_header.php';
?>

<h2>Search Results</h2>
<table>
    <tr>
        <th>Due Date ID</th>
        <th>Patron ID</th>
        <th>Book ID</th>
        <th>Return By Date</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($overdue_books as $overdue_book) {
        echo "<tr>";
        echo "<td>" . $overdue_book['due_date_id'] . "</td>";
        echo "<td>" . $overdue_book['patron_id'] . "</td>";
        echo "<td>" . $overdue_book['book_id'] . "</td>";
        echo "<td>" . $overdue_book['return_by_date'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include 'view/_footer.php';
?>