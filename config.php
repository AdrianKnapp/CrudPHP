<?php
$dsn = "mysql:dbname=crud_php;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
  $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch( PDOException $e) {
  echo "Deu erro" .$e->getMessage();
  exit;
}

?>