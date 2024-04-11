<?php 
include "header.php";
include "./config.php";

$username = $_POST["username"];
$password = $_POST["password"];

if(isset($_POST["login"])){
    $sql = "select * from admin";
    $result = mysqli_query($connect,$sql) or die("can't connect");
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
        if($username==$row["username"] and $password==$row["password"]){
            header("Location: posts.php");
        }
        else{
            echo "can't connect";
            header("Location index.php");
            exit();
        }
        }
    }
}
?>
<body>
<header class="header" id="header">
       
     <h1 class="logo"><a href="index.php">mfm.</a></h1> 
</header>
<main>
     <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="username">
            <label for="#username">Username:</label>
            <br />
            <input type="text" name="username" autofocus autocomplete="off" required id="username" />
        </div>
        <div class="password">
            <label for="#password">Password:</label>
            <br />
            <input required autocomplete="off" type="password" name="password" id="password" />
        </div>
        <input type="submit" value="Login" name="login" />
     </form>
</main>

<?php 
include "footer.php";
?>
