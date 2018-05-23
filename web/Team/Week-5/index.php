<?php

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_POST['book'])) {
    $book = $_POST['book'];
    $book = '%' . $book . '%';
    var_dump($book);

    $stmt = $db->prepare('SELECT * FROM scriptures.scriptures WHERE book LIKE :book');
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

else {
    $stmt = $db->prepare('SELECT * FROM scriptures.scriptures');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<h1>Scripture Resources</h1>';

    foreach($rows as $row) {
        echo '<p>';
        echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - </strong>';
        echo '"' . $row['content'] . '"';
        echo '</p>';
    }
}

?>
<!-- STRETCH CHALLENGE 01 -->

<form action="index.php" method="post">
    <strong><label for="book">Book:</label></strong>
    <input type="text" name="book" id="book">
    <input type="submit" value="Search">
</form>


