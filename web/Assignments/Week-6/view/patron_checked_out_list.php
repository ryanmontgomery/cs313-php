<hr>

<h2>Currently Checked Out</h2>
<table>
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Due Date</th>
        <th>Days Late</th>
    </tr>
    <?php foreach($checked_out_books as $checked_out_book) {
        $due_date = new DateTime($checked_out_book['return_by_date']);
        $now = new DateTime();
        $now = $now->setTime(0,0);
        $days_late = $now->diff($due_date)->format('%a');

        echo '<tr>';
        echo '<td>' . $checked_out_book['book_id'] . '</td>';
        echo '<td>' . $checked_out_book['title'] . '</td>';
        echo '<td>' . $checked_out_book['return_by_date'] . '</td>';
        echo '<td>' . ($due_date >= $now ? '0' : $days_late) . '</td>';
        echo '</tr>';
    } ?>
</table>