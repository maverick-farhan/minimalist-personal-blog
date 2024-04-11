<?php 
include "header.php";
include "./config.php";

$title = mysqli_escape_string($connect,$_POST["title"]);
$desc = mysqli_escape_string($connect,$_POST["desc"]);
$date = mysqli_escape_string($connect,$_POST["date"]);
if(isset($_POST["submit"])){
    if(mysqli_query($connect,"describe `posts`")){
    $sql = "insert into posts (ptitle,pdesc,pdate) values ('{$title}','{$desc}','{$date}');";
    $result = mysqli_query($connect,$sql) or die("can't connect");
    header("location: ./posts.php");
}
else{
    echo "Cant run";
    header("location: add_posts.php");
    exit();
}
}
?>
<body>
<header class="header" id="header">      
     <h1 class="logo"><a href="index.php">mfm.</a></h1> 
</header>
<main>
     <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="title">
            <label for="#title">Blog Title:</label>
            <br />
            <input type="text" name="title" autofocus autocomplete="off" required id="title" />
        </div>
        <div class="description">
            <label for="desc">Blog Description:</label>
            <br />
            <textarea required autocomplete="off" type="text" name="desc" id="desc"></textarea>
        </div>
        <div class="date">
            <label for="date">Blog Date:</label>
            <br />
            <input required autocomplete="off" type="text" name="date" id="date" />
        </div>
        <input type="submit" value="Upload Blog" name="submit" />
     </form>
</main>

<?php 
include "footer.php";
?>
