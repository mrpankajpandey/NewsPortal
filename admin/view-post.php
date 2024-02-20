<?php
include("authentication.php");
include("include/header.php");


?>


<div class="container-fluid px-4">

 
 

   <div class="row mt-4">
      <div class="col-md-12 mb-3">
        <?php include('message.php') ?>
        <div class="card">
            <div class="card-header">
                <a href="add-post.php" class="btn btn-primary float-end"> Add New </a>
                <h4>View Post </h4>
               
            </div>
            <div class="card-body">

                   
                    <table class=" table table-borderd table-stripe">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
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
                        ORDER BY post.id  LIMIT {$offset},{$limit}";
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run) > 0){
                            foreach($run as $row){
                                ?> 
                                <tr>
                                    <td><?=$row['id'] ?></td>
                                    <td><?=$row['title'] ?></td>
                                    <td><?=$row['name'] ?></td>
                                    <td>
                                      <img src="uploads/<?php echo $row['image'] ?>" alt="" height="80px" width="80px">
                                    </td>
                                    <td><?= $row['date']?></td>
                                    <td><?= $row['username']?></td>
                                 
                                    <td><a href="edit-post.php?id=<?=$row['id']?>" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <!-- <form action="code.php" method="post"> -->
                                        <a href="delete-post.php?id=<?php echo $row['id'];?>&catid=<?php echo $row['category']?>" class="btn btn-danger">Delete</a>
                                     
                                    <!-- </form> -->
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{

                        }
                        
                        ?>
                      </tbody>
                    </table>
                 
                   <div class="card-footer">
                   <?php 
        $sql = "SELECT * FROM post";
        $run = mysqli_query($conn, $sql);
        if(mysqli_num_rows($run ) > 0 ){
            
            $total_record = mysqli_num_rows($run);
          
            $total_page = ceil($total_record / $limit);
            echo '<ul class="pagination flex justify-content-center">';
            if($page > 1){
                 echo '<li class="page-item"><a class="page-link" href="view-post.php?page = '.($page - 1).'">Prev</a></li>';
            }
           

             
            for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = "";
                }
            
            echo '<li class="page-item '.$active.'  "><a class="page-link" href="view-post.php?page= '.$i.' ">'.$i.'</a></li>';
          
            }

        
        if($total_page > $page){
            echo '<li class="page-item"> <a class="page-link" href="view-post.php?page= '.($page + 1).' ">Next</a></li>';
       }
       
        echo '</ul>';
    }
        ?>
                   </div>
            </div>
        </div>
      </div>


  </div> 
</div>


<?php
include("include/footer.php");
include("include/scripts.php");

?>