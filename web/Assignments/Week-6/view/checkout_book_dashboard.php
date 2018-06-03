
<hr>
<h2><?php echo $patron['first_name'] . ' ' . $patron['last_name']; ?></h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="checkout_book">
    <input type="hidden" name="patron_id" value="<?php echo $patron_id; ?>"
    <label for="checkout_book_id">Book ID:</label>
    <input id="checkout_book_id" type="number" name="book_id" required>
    <input type="submit" value="Select">
</form>

<?php echo $checkout_error ?>