<?php
include 'view/_header.php';
?>

<h2>Library Patron</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="get_patrons_books">
    <label for="get_patron">Library Card Number:</label>
    <input id="get_patron" type="number" name="patron_id" required>
    <input type="submit" value="Select">
</form>