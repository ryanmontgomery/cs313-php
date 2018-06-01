<?php
include 'view/_header.php';
?>

<h2><?php echo $author['first_name'] . ' ' . $author['last_name']; ?></h2>
<p><?php echo $author['bio']; ?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="author_update_form">
                <input type="hidden" name="author_id" value="<?php echo $author['author_id']; ?>">
                <input type="hidden" name="first_name" value="<?php echo $author['first_name']; ?>">
                <input type="hidden" name="last_name" value="<?php echo $author['last_name']; ?>">
                <input type="hidden" name="bio" value="<?php echo $author['bio']; ?>">
                <input type="submit" value="Edit">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="delete_author">
                <input type="hidden" name="author_id" value="<?php echo $author['author_id']; ?>">
                <input type="submit" value="Delete">
            </form>

<?php
include 'view/_footer.php';
?>