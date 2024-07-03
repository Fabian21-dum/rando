<?php
require_once("./konek.php");
$id = $_GET['id_pen'];
$sql = "delete from penulis where id_penulis = '".$id."'";
$conn->query($sql);
header("Location:./tampil_penulis.php");
?>