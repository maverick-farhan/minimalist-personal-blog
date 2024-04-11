<?php
include './config.php';
$id = $_GET['id'];
$sql = "delete from posts where pid={$id}";
$result = mysqli_query($connect, $sql) or die("Query failed to fetch");

header("Location: posts.php");
mysqli_close($connect);
?>