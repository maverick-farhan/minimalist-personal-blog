<?php 
include "header.php";
?>
<body>
    <header class="header" id="header">      
        <h1 class="logo"><a href="<?php isset($_SESSION["username"])?'posts.php':'index.php';?>">mfm.</a></h1> 
    </header>
    <main>
    <?php 
    include "./config.php";
    $id = $_GET['id'];
    $sql = "select * from posts where pid={$id};";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){

    ?>
     <form action="edit_action.php" method="post">
        <div class="title">
            <label for="#title">Blog Title:</label>
            <br />
            <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>"/>
            <input type="text" name="title" autofocus autocomplete="off" required id="title" value="<?php echo $row['ptitle'] ?>" />
        </div>
        <div class="description">
            <label for="desc">Blog Description:</label>
            <br />
            <textarea required autocomplete="off" type="text" name="desc" id="desc">
            <?php echo $row['pdesc'] ?>
            </textarea>
        </div>
        <div class="date">
            <label for="date">Blog Date:</label>
            <br />
            <input required autocomplete="off" type="text" name="date" id="date" value="<?php echo $row['pdate'] ?>"/>
        </div>
        <input type="submit" value="Edit Blog" name="submit" />
     </form>
     <?php 
        }
    }
     ?>
</main>

<?php 
include "footer.php";
?>
