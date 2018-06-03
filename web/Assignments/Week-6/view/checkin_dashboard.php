<?php include 'view/_header.php'; ?>

<h2>Check In</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="checkin_book">
    <input type="hidden" name="patron_id" value="<?php echo $patron_id; ?>"
    <label for="checkin_book_id">Book ID:</label>
    <input id="checkint_book_id" type="number" max="2000000000" name="book_id" required>
    <input type="submit" value="Select">
</form>

<?php

echo $checked_in_verification;
echo $checked_in_error;

?>