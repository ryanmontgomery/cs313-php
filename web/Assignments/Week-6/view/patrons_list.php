<?php
include 'view/_header.php';
?>

<h2>Search Results</h2>
<table>
    <tr>
        <th>Patron ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Phone Number</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($patrons as $patron) {
        echo "<tr>";
        echo "<td>" . $patron['patron_id'] . "</td>";
        echo "<td>" . $patron['first_name'] . "</td>";
        echo "<td>" . $patron['last_name'] . "</td>";
        echo "<td>" . $patron['address1'] . "</td>";
        echo "<td>" . $patron['address2'] . "</td>";
        echo "<td>" . $patron['city'] . "</td>";
        echo "<td>" . $patron['state'] . "</td>";
        echo "<td>" . $patron['zip_code'] . "</td>";
        echo "<td>" . $patron['phone'] . "</td>";
        echo "<td>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='get_patron'>";
        echo "<input type='hidden' name='patron_id' value='" . $patron['patron_id'] . "'>";
        echo "<input type='submit' value='Details'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include 'view/_footer.php';
?>