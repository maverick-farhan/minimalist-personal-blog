<?php 
include "header.php";
include "./config.php";
?>
<body>
<header class="header" id="header">      
     <h1 class="logo"><a href="index.php">mfm.</a></h1> 
     <ul class="navbar">
        <li class="navlist"><a href="logout.php">Logout</a></li>
        <li class="navlist"><a href="add_posts.php">Add Post</a></li>
     </ul>
</header>
<main>
<table id="posts">
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Date</th>
</tr>
<?php 
$limit = 5;
if(isset($_GET["page"])){
$page = $_GET["page"];
}
else{
$page = 1;
}
$offset = ($page - 1) * $limit;
$sql = "select * from posts limit {$offset},{$limit} ";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>$row[pid]</td>";
    echo "<td>$row[ptitle]</td>";
    echo "<td>$row[pdesc]</td>";
    echo "<td>$row[pdate]</td>";
    echo "</tr>";
}
}
?>
</table>
<?php 
$pagination_sql = "select * from posts";
$pagination_result = mysqli_query($connect,$pagination_sql);
if(mysqli_num_rows($pagination_result)>0){
    $total_records = mysqli_num_rows($pagination_result);
    $total_pages = ceil($total_records / $limit);
    echo '<ul class="pagination">';
    if($page>1){
    echo '<li class="page-list"><a href="posts.php?page='.($page - 1).'"><i class="ri-arrow-left-s-line"></i></a></li>';
    
    }
    for($i = 1;$i<=$total_pages;$i++){
    if($i==$page){
        $active = "active";
    }
    else{
        $active = "";
    }

       echo  '<li class="page-list '.$active.'"><a href="posts.php?page='.$i.'">'.$i.'</a></li>';
    }
    if($total_pages>$page){
    echo '<li class="page-list"><a href="posts.php?page='.($page + 1).'"><i class="ri-arrow-right-s-line"></i></a></li>';
    }
    echo "</ul>";
}

?>

    

</main>

<?php 
include "footer.php";
?>