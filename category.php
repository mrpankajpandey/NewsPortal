<?php 
include 'include/header.php';
include 'include/navbar.php';
 ?>

    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                      <?php  $category = $_GET['category'];
                      $sql2 = "SELECT name FROM category WHERE id = $category";
        $run2 = mysqli_query($conn, $sql2);
         $row2 = mysqli_fetch_assoc($run2);
         $catANme = $row2['name'];
         ?>
                  <h2 class="page-heading"><?php echo strtoupper($catANme); ?></h2>
                  <?php 
                        
                        $limit = 3;
                     
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                         $page = 1;
                        }
                     
                        $offset = ($page -1 ) *$limit;
                      $query = "SELECT post.*, category.name , users.username FROM  post 
                      LEFT JOIN category ON post.category = category.id
                      LEFT JOIN users ON post.author = users.id
                      WHERE post.category = $category  LIMIT {$offset},{$limit}";
                      $run = mysqli_query($conn, $query);
                   
                      if(mysqli_num_rows($run) > 0){
                          foreach($run as $row){
                              ?>

                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo $row['id'] ?>"><img
                                        src="admin/uploads/<?php echo $row['image'] ?>" alt=""></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php  echo $row['id'] ;?>'><?=$row['title'] ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a
                                                href='category.php?name=<?php echo $row['name'] ?>'><?= strtoupper($row['name']) ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a
                                                href='author.php?author=<?php echo $row['id'] ?>'><?=$row['username'] ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?=$row['date'] ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                        <?=$row['description'] ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo  $row['id']; ?>'>read
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php   }
                      }
        $sql = "SELECT * FROM post WHERE category = $category";
        $run = mysqli_query($conn, $sql);
        if(mysqli_num_rows($run ) > 0 ){
            
            $total_record = mysqli_num_rows($run);
          
            $total_page = ceil($total_record / $limit);
            echo '<ul class="pagination flex justify-content-center">';
            if($page > 1){
                 echo '<li class="page-item"><a class="page-link" href="category.php?page = '.($page - 1).'">Prev</a></li>';
            }
           

             
            for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = "";
                }
            
            echo '<li class="page-item '.$active.'  "><a class="page-link" href="category.php?page= '.$i.' ">'.$i.'</a></li>';
          
            }

        
        if($total_page > $page){
            echo '<li class="page-item"> <a class="page-link" href="category.php?page= '.($page + 1).' ">Next</a></li>';
       }
       
        echo '</ul>';
    }
        ?>


                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'include/sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'include/footer.php'; ?>
