<?php
include 'view/_header.php';
?>

<div id="get_overdue_books" class="dashboard_section">
    <h2>Search For Overdue Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="get_overdue_books">
        <input type="submit" value="Search">
    </form>
</div>

<div id="get_patrons_books" class="dashboard_section">
    <h2>Search For Patrons Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="get_patrons_books">
        <label for="search_by_patron">Library Card Number:</label>
        <input id="search_by_patron" type="number" name="patron_id" required>
        <input type="submit" value="Search">
    </form>
</div>

<?php
include 'view/_footer.php';
?>