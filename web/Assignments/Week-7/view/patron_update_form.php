<?php include'view/_header.php'; ?>

<h2>Update Patron</h2>
<div id="update_patron" class="dashboard_section">
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update_patron">
        <input type="hidden" name="patron_id" value="<?php echo $patron_id;?>">
        <label for="update_first_name">First Name:</label>
        <input id="update_first_name" type="text" name="first_name" value="<?php echo $first_name; ?>" required><br>
        <label for="update_last_name">Last Name:</label>
        <input id="update_last_name" type="text" name="last_name" value="<?php echo $last_name; ?>" required><br>
        <label for="update_address1">Address 1:</label>
        <input id="update_address1" type="text" name="address1" value="<?php echo $address1; ?>" required><br>
        <label for="update_address2">Address 2:</label>
        <input id="update_address2" type="text" name="address2" value="<?php echo $address2; ?>" ><br>
        <label for="update_city">City:</label>
        <input id="update_city" type="text" name="city" value="<?php echo $city; ?>" required><br>
        <label for="update_state">State:</label>
        <input id="update_state" type="text" name="state" value="<?php echo $state; ?>" required><br>
        <label for="update_zip_code">Zip Code:</label>
        <input id="update_zip_code" type="number" name="zip_code" value="<?php echo $zip_code; ?>" required><br>
        <label for="update_phone">Phone:</label>
        <input id="update_phone" type="text" name="phone" value="<?php echo $phone; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</div>

<?php include'view/_footer.php'; ?>