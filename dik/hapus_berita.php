<?php
require_once("./konek.php");
$id = $_GET['id'];
$sql = "delete from berita where id = '".$id."'";
$conn->query($sql);
header("Location:./tampil_berita.php");
?>