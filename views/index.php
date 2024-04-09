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
    <main class="main">
        <header class="main">
        <h1 class="main-title">@Blog</h1>
        <form action="search.php" method="get">
        <div class="search-container">
            <input type="search" required name="search" autofocus id="search" autocomplete="off"/>
            <button id="submit" type="submit" name="submit"><i class="ri-search-2-line"></i></button>
        </div>    
        </form>
        </header>

        <div class="container-blog">
            <div class="blog">
                <h4 class="date">2024.03</h4>
                <h4 class="topics"><a href="#">Async Js fundamentals</a></h4>
            </div>
        </div>

        <footer class="footer">
            <h4>&copy;mfm | 2024</h4>
        </footer>
    </main>
<?php 
include "footer.php";
?>