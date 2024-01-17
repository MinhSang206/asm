<?php
require_once 'db.php';

$id = $_GET["id"];
$sql = "DELETE FROM products WHERE id = '$id'";
$conn -> exec($sql);

header("location: index.php");

?>