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
                <a href="view-post.php" class="btn btn-primary float-end">Back</a>
                <h4>Edit Post</h4>
            </div>
            <div class="card-body">
                <?php 
                $post_id = $_GET['id'];
                $sql = "SELECT post.*, category.name FROM post
                LEFT JOIN category ON post.category = category.id
                WHERE post.id = $post_id";
                
                $run = mysqli_query($conn, $sql);
                if(mysqli_num_rows($run) > 0){
                    while($row = mysqli_fetch_assoc($run)){
                       
                        ?> 
                     <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">ID</label>
                            <input readonly="true" type="text" required value= "<?=$row['id']?>" name="id" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">CAtegory</label>
                            <select name="category" id="" class="form-control">
                                <?php
                                $sql1 = "SELECT * FROM category";
                                $run1 = mysqli_query($conn, $sql1);
                                if(mysqli_num_rows($run1) > 0){

                                    while($row1 = mysqli_fetch_assoc($run1)){
                                        if($row['category'] == $row1['id']){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option {$selected} value='{$row1['id']}'>{$row1['name']}</option>";
                                    }
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" required value= "<?=$row['title']?>" name="title" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label"> Description</label>
                            <textarea id="summe" required type="textarea" name="description" class="form-control" > </textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label"> Image</label>
                             <input type="file" name="new-image" id="">
                             <img src="uploads/<?php echo $row['image'] ?>" alt="" height="60px" width="60px">
                             <input type="hidden" name="old-image" id="" value="<?php echo $row['image'] ?>">

                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="edit-post" type="submit">Save Post</Button>
                        </div>
                        </div>
                     </form>
                        <?php
                    }
                }else{
                    ?>
                    <h4>Post Not Found</h4>
                     <?php
                }
                ?>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
include("include/footer.php");
include("include/scripts.php");

?>