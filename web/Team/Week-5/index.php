<p>Hello</p>
<?php

$dbUrl = getenv('postgres://vyspfogwrfyfsv:8bbdb1ac5d1e0f645acfd30921b63092716f07f20eae6e991a4ed6662bc65bae@ec2-23-23-142-5.compute-1.amazonaws.com:5432/db3nf2kbu5ee1j');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('SELECT * FROM scriptures.scriptures');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>Sripture Resources</h1>';

foreach($rows as $row) {
    echo '<p>';
    echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - </strong>';
    echo '"' . $row['content'] . '"';
    echo '</p';
}
