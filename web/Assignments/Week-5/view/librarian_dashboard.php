<?php
include 'view/_header.php';
?>

<div id="checkout" class="dashboard_section">
    <h2>Check Out Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="check_out_books">
        <input type="submit" value="Go">
    </form>
</div>

<div id="checkin" class="dashboard_section">
    <h2>Check In Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="check_in_books">
        <input type="submit" value="Go">    
    </form>
</div>

<div id="patrons" class="dashboard_section">
    <h2>Library Patrons</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="patron_dashboard">
        <input type="submit" value="Go">
    </form>
</div>

<div id="authors" class="dashboard_section">
    <h2>Authors</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="author_dashboard">
        <input type="submit" value="Go">
   </form>
</div>

<div id="books" class="dashboard_section">
    <h2>Books</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="book_dashboard">
        <input type="submit" value="Go">
   </form>
</div>

<div id="due_dates" class="dashboard_section">
    <h2>Due Dates</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="due_dates_dashboard">
        <input type="submit" value="Go">
   </form>
</div>

<?php
include 'view/_footer.php';
?>