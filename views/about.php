<?php 
include "header.php";
?> 
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
<main class="main" id="about-main">
        <header class="main">
        <h1 class="main-title">@About</h1>
        </header>
        <div class="about">

        <div class="image"><img src="farhan.jpg" alt=""></div>
<?php include "./config.php";
$sql = "select * from about";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<p class='about_para'>".$row["aboutme"].".</p>";
    }
}
?>
        </div>
    </main>
<?php 
include "footer.php";
?>