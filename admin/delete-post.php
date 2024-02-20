                                        
    
    <?php
include('authentication.php');
    $delte_id = $_GET['id'];
    $cat_id = $_GET['catid'];
    $sql1 = "SELECT * FROM  post WHERE  id = $delte_id";
    $result = mysqli_query($conn, $sql1) or die("Sql Failed :  Select");
    $row = mysqli_fetch_assoc($result);
    unlink("uploads/".$row['image']);
    $sql = "DELETE FROM post  WHERE id = {$delte_id};";
    $sql .="UPDATE category SET post = post - 1 WHERE id = $cat_id";
    if(mysqli_multi_query($conn, $sql)){
        $_SESSION['message']= "Post deleted Successfully!";
        header('Location: view-post.php');
        exit(0);
    }
    else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: view-post.php');
        exit(0);
    }

    ?>