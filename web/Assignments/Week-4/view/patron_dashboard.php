<?php
include 'view/_header.php';
?>

<div id="get_patron" class="dashboard_section">
    <h2>Patron Details</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="get_patron">
        <label for="details_patron_id">Library Card Number:</label>
        <input type="number" name="patron_id" required>
        <input type="submit" value="Search">
    </form>
</div>

<div id="search_patron" class="dashboard_section">
    <h2>Search For Patrons</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="search_patron">
        <label for="search_last_name">Last Name:</label>
        <input id="search_last_name" type="text" name="last_name" required>
        <input type="submit" value="Search">
    </form>
</div>

<div id="add_patron" class="dashboard_section">
    <h2>New Patron</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_patron">
        <label for="new_first_name">First Name:</label>
        <input id="new_first_name" type="text" name="first_name" required><br>
        <label for="new_last_name">Last Name:</label>
        <input id="new_last_name" type="text" name="last_name" required><br>
        <label for="new_address1">Address 1:</label>
        <input id="new_address1" type="text" name="address1" required><br>
        <label for="new_address2">Address 2:</label>
        <input id="new_address2" type="text" name="address2"><br>
        <label for="new_city">City:</label>
        <input id="new_city" type="text" name="city" required><br>
        <label for="new_state">State:</label>
        <input id="new_state" type="text" name="state" required><br>
        <label for="new_zip_code">Zip Code:</label>
        <input id="new_zip_code" type="number" name="zip_code" required><br>
        <label for="new_phone">Phone:</label>
        <input id="new_phone" type="text" name="phone" required><br>
        <input type="submit" value="Add">
    </form>
</div>

<?php
include 'view/_footer.php';
?>