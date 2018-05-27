<?php
include 'view/_header.php';
?>

<h2>Details</h2>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Phone Number</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td><?php echo $patron['first_name']; ?></td>
        <td><?php echo $patron['last_name']; ?></td>
        <td><?php echo $patron['address1']; ?></td>
        <td><?php echo $patron['address2']; ?></td>
        <td><?php echo $patron['city']; ?></td>
        <td><?php echo $patron['state']; ?></td>
        <td><?php echo $patron['zip_code']; ?></td>
        <td><?php echo $patron['phone']; ?></td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="patron_update_form">
                <input type="hidden" name="patron_id" value="<?php echo $patron['patron_id']; ?>">
                <input type="hidden" name="first_name" value="<?php echo $patron['first_name']; ?>">
                <input type="hidden" name="last_name" value="<?php echo $patron['last_name']; ?>">
                <input type="hidden" name="address1" value="<?php echo $patron['address1']; ?>">
                <input type="hidden" name="address2" value="<?php echo $patron['address2']; ?>">
                <input type="hidden" name="city" value="<?php echo $patron['city']; ?>">
                <input type="hidden" name="state" value="<?php echo $patron['state']; ?>">
                <input type="hidden" name="zip_code" value="<?php echo $patron['zip_code']; ?>">
                <input type="hidden" name="phone" value="<?php echo $patron['phone']; ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="delete_patron">
                <input type="hidden" name="patron_id" value="<?php echo $patron['patron_id']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
</table>

<?php
include 'view/_footer.php';
?>