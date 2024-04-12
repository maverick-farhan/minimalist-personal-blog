
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mfm | Read blog</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>

    <header class="header" id="header">
       
     <h1 class="logo"><a href="index.php">mfm.</a></h1> 

        <ul class="navbar">
           <li class="navlist"><a href="about.php">About</a></li> 
           <li class="navlist"><a href="projects.php">Projects</a></li> 
           <li class="navlist"><a href="contact.php">Contact</a></li> 
           <li class="mode">
            <i class="ri-sun-fill" id="light-mode"></i>
            <i class="ri-moon-fill" id="dark-mode"></i>
        </li>

        </ul>
    </header>

<?php 
include './config.php';
$id = $_GET["id"];

$sql = "select * from posts where pid={$id}";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){

?>

    <main class="main" id="main-blog">
        <header class="main" id="header-blog">
        <h1 class="main-title"id="blog-title"><?php echo $row["ptitle"] ?></h1>
        <br />
        <h5 class="date"><?php echo $row["pdate"] ?></h5>
        </header>

        <section class="blog">
            <?php echo $row["pdesc"]?>
        </section>


    </main>
    <?php 
    }
}
    ?>
<?php 
include "footer.php";
?>