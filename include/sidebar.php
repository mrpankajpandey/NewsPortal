<?php include('./admin/config/conn.php') ?>

<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
    <?php 
         $query = "SELECT post.*, category.name , users.username FROM  post 
         LEFT JOIN category ON post.category = category.id
         LEFT JOIN users ON post.author = users.id
         ORDER BY post.id DESC LIMIT 5";
         $run = mysqli_query($conn, $query);
         $term = mysqli_fetch_assoc($run);
         $search = $term['title'];
        
         ?>
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="POST">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                 <button type="submit" name="" class="btn btn-danger">Search</button>   
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
      
      <?php
         if(mysqli_num_rows($run) > 0){
             foreach($run as $row){
                 ?> 
        
      
        <div class="recent-post">
            <a class="post-img" href="./single.php?id=<?=$row['id'] ?>">
                <img src="./admin/uploads/<?=$row['image'] ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo$row['id'] ?>"><?=$row['title'] ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?category=<?php echo $row['category'] ?>'><?= strtoupper($row['name']); ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?=$row['date'] ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $row['id']; ?>">read more</a>
            </div>
        </div>

        <?php }
        }?>
     
    </div>
    <!-- /recent posts box -->
</div>
