<?php
$dsn  = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
    // Connect DB
    $dbh = new PDO($dsn, $user, $pass);

    // Proceed query
    // $query_result = $dbh->query('SELECT * FROM test_comments');
    // $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');
    $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');

    // Disconnect DB
    $dbh = null;
} catch (PDOException $e) {
    // If connection error occured
    print "DB ERROR : " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
$name = "John";
$sth_select->execute(array($name));
$prepare_result = $sth_select->fetchAll();

foreach($prepare_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
}
$sth_select->execute(array($name));
?>