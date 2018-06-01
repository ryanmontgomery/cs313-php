<?php
include 'view/_header.php';
?>

<h2>Search Results</h2>
<table>
    <tr>
        <th>Author ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($authors as $author) {
        echo "<tr>";
        echo "<td>" . $author['author_id'] . "</td>";
        echo "<td>" . $author['first_name'] . "</td>";
        echo "<td>" . $author['last_name'] . "</td>";
        echo "<td>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='get_author'>";
        echo "<input type='hidden' name='author_id' value='" . $author['author_id'] . "'>";
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