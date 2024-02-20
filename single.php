<?php include 'include/header.php'; 
 include 'include/navbar.php'; 
?>


<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->




                <div class="post-container">

                    <?php
                  $postId= $_GET['id'];
                  $query = "SELECT post.*, category.name , users.username FROM  post 
                  LEFT JOIN category ON post.category = category.id
                  LEFT JOIN users ON post.author = users.id
                   WHERE post.id = $postId ORDER BY post.id";
                  $run = mysqli_query($conn, $query);
               
                  if(mysqli_num_rows($run) > 0){
                      foreach($run as $row){
                          ?>

                    <div class="post-content single-post">
                        <h3><?=$row['title'] ?></h3>
                        <div class="post-information">
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <?=$row['name'] ?>
                            </span>
                            <span>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a href='author.php'><?=$row['username'] ?></a>
                            </span>
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?=$row['date'] ?>
                            </span>
                        </div>
                        <img class="single-feature-image" src="admin/uploads/<?=$row['image'] ?>" alt="" />
                        <p class="description">
                        <?=$row['description'] ?>
                        </p>
                    </div>
                    <?php }
                    }?>
                </div>
                <!-- /post-container -->
            </div>
            <?php include 'include/sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>