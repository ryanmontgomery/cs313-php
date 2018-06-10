<hr>

<h2>Check Out History</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Due Date</th>
        <th>Returned</th>
        <th>Days Late</th>
    </tr>
    <?php foreach($checked_out_books as $checked_out_book) {
        $due_date = new DateTime($checked_out_book['return_by_date']);
        $now = new DateTime();
        $now = $now->setTime(0,0);
        $days_late = $now->diff($due_date)->format('%a');

        echo '<tr>';
        echo "<td><a href=index.php?action=get_book&book_id=" . $checked_out_book['book_id'] . ">" . $checked_out_book['book_id'] . "</a></td>";
        echo "<td><a href=index.php?action=get_author&author_id=" . $checked_out_book['author_id'] . ">" . $checked_out_book['first_name'] . " " . $checked_out_book['last_name'] . "</a></td>";
        echo '<td>' . $checked_out_book['title'] . '</td>';
        echo '<td>' . $checked_out_book['return_by_date'] . '</td>';
        echo '<td>' . $checked_out_book['checked_in_date'] . '</td>';
        echo '<td>' . ($due_date >= $now ? '0' : $days_late) . '</td>';
        echo '</tr>';
    } ?>
</table>