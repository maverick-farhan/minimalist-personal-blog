<?php 
include "./config.php";
$pid = $_POST['pid'];
$title = mysqli_escape_string($connect,$_POST["title"]);
$desc = mysqli_escape_string($connect,$_POST["desc"]);
$date = mysqli_escape_string($connect,$_POST["date"]);
    $sql = "update posts set ptitle = '{$title}',pdesc='{$desc}',pdate ='{$date}' where pid= '{$pid}'";
    $result = mysqli_query($connect,$sql) or die("can't connect");
    header("location: posts.php");

?>