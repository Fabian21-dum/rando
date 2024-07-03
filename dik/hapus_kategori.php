<?php
require_once("./konek.php");
$id = $_GET['id'];
$sql = "delete from kategori where id_kategori = '".$id."'";
$conn->query($sql);
header("Location:./tampil_kategori.php");
?>