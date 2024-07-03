<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=dik", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$sql = "SELECT * from berita";
$result = $conn->query($sql);

$articles = $result->fetchAll(PDO::FETCH_ASSOC);

if ($articles) {

    foreach ($articles as $article) {
      
    }
}
