<p>Hello</p>
<?php
/* 
---------------- HEROKU --------------------
*/
$dbUrl = getenv('DATABASE_URL');

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
/*
try
{
  $user = 'postgres';
  $password = 'monkeytoo2';
  $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);

  // this line makes PDO give us an exception when there are problems,
  // and can be very helpful in debugging! (But you would likely want
  // to disable it for production environments.)
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$stmt = $db->prepare('SELECT * FROM scriptures.scriptures');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
echo '<h1>Sripture Resources</h1>';

foreach($rows as $row) {
    echo '<p>';
    echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - </strong>';
    echo '"' . $row['content'] . '"';
    echo '</p';
}
