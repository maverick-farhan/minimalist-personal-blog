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
        <form action="search.php" method="post">
        <div class="search-container">
            <input type="search" required name="search" autofocus id="search" autocomplete="off"/>
            <button id="submit" type="submit" name="submit"><i class="ri-search-2-line"></i></button>
        </div>    
        </form>
        </header>

        <div class="container-blog">
        <?php 

include "./config.php";
$limit = 5;
if(isset($_GET["page"])){
$page = $_GET["page"];
}
else{
$page = 1;
}
$offset = ($page - 1) * $limit;
if(isset($_POST["submit"])){
    $search_term = $_POST["search"];
    $sql = "select * from posts where ptitle like '%$search_term%' or pdesc like '%$search_term%'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
            
            ?>
            <div class="blog">
                <h4 class="date"><?php echo $row["pdate"]?></h4>
                <h4 class="topics"><a href="readpost.php?id=<?php echo $row["pid"]?>"><?php echo $row["ptitle"]?></a></h4>
            </div>
            <?php
            }
        }
    }
    else{
        echo "<h4 class='date'>No Record Found</h4>";
    }
        ?>
        </div>
<?php 
$pagination_sql = "select * from posts";
$pagination_result = mysqli_query($connect,$pagination_sql);
if(mysqli_num_rows($pagination_result)>0){
    $total_records = mysqli_num_rows($pagination_result);
    $total_pages = ceil($total_records / $limit);
    echo '<ul class="pagination">';
    if($page>1){
    echo '<li class="page-list"><a href="search.php?page='.($page - 1).'"><i class="ri-arrow-left-s-line"></i></a></li>';
    
    }
    for($i = 1;$i<=$total_pages;$i++){
    if($i==$page){
        $active = "active";
    }
    else{
        $active = "";
    }

       echo  '<li class="page-list '.$active.'"><a href="search.php?page='.$i.'">'.$i.'</a></li>';
    }
    if($total_pages>$page){
    echo '<li class="page-list"><a href="search.php?page='.($page + 1).'"><i class="ri-arrow-right-s-line"></i></a></li>';
    }
    echo "</ul>";
}

?>

        <footer class="footer">
            <h4>&copy;mfm dev blog | 2024</h4>
        </footer>
    </main>
<?php 
include "footer.php";
?>