<?php 
include "header.php";
include "./config.php";
// if(isset($_SESSION["username"])){
//     header("location: posts.php");
// }
// else{
//     header("location: index.php");
// }



if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from admin";
    $result = mysqli_query($connect,$sql) or die("can't connect");
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["username"] = $row['username'];
        if($username==$row["username"] and $password==$row["password"]){
            header("Location: posts.php");
        }
        else{
            header("Location index.php");
            exit();
        }
        }
    }
}
?>
<body>
<header class="header" id="header">
     <h1 class="logo"><a href="<?php isset($_SESSION["username"])?'posts.php':'index.php';?>">mfm.</a></h1> 
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
