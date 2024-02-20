<?php
include('authentication.php');
include('include/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
    <div class="col-md-12 mb-3">
    <?php include('message.php') ?>
           <div class="card">
            <div class="card-header">
                <a href="add-category.php" class="btn btn-primary float-end">Add New</a>
                <h4>View Category</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripe">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>No. Post</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        $query = "SELECT * FROM  category ORDER BY id DESC  LIMIT {$offset},{$limit}";
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run) > 0){
                            foreach($run as $row){
                                ?> 
                                <tr>
                                    <td><?=$row['id'] ?></td>
                                    <td><?=$row['name'] ?></td>
                                    <td><?= $row['date']?></td>
                                    <td>
                                    <?php
                                         $category_id = $row['id'];
                                         $query1 = "SELECT * FROM post WHERE category = $category_id ";
                                         $query_run =mysqli_query($conn, $query1);
                                         $total_posts = mysqli_num_rows($query_run);

                                        
                                            echo $total_posts;
                                            

                                    
                                            
                                        
                                        ?>
                                </td>
                                    <td><a href="edit-category.php?id=<?=$row['id']?>" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form action="code.php" method="post">
                                        <button type="submit"  name="delete-category" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{

                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            <?php 
        $sql = "SELECT * FROM category";
        $run = mysqli_query($conn, $sql);
        if(mysqli_num_rows($run ) > 0 ){
            $total_record = mysqli_num_rows($run);
          
            $total_page = ceil($total_record / $limit);
            echo '<ul class="pagination flex justify-content-center">';
            if($page > 1){
                 echo '<li class="page-item"><a class="page-link" href="view-category.php?page = '.($page - 1).'">Prev</a></li>';
            }
           

             
            for($i = 1; $i <= $total_page; $i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = "";
                }
            
            echo '<li class="page-item '.$active.'  "><a class="page-link" href="view-category.php?page= '.$i.' ">'.$i.'</a></li>';
          
            }

      
        if($total_page > $page){
            echo '<li class="page-item"> <a class="page-link" href="view-category.php?page= '.($page + 1).' ">Next</a></li>';
       }
        echo '</ul>';  
    }
        ?>
            </div>
           </div>
    </div>
</div>
</div>

<?php
include('include/footer.php');
include('include/scripts.php');
?>