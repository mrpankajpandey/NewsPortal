<?php 
include('authentication.php');
include('include/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">

        <div class="col-md-12 mb-3">
            <?php include('message.php') ?>
            <?php
         include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <a href="view-user.php" class="btn btn-primary float-end">Back</a>
                    <h4>Edit category</h4>
                </div>
                <div class="card-body">
                    <?php
                if(isset($_GET['id'])){
                  
                    $id = $_GET['id'];
                    
                    $user_query = "SELECT * FROM category WHERE id ='$id' ";
                    $user_query_run = mysqli_query($conn, $user_query);

                    if(mysqli_num_rows($user_query_run) > 0){

                        foreach($user_query_run as $data){
                            ?>
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="name" class="form-label">ID</label>
                                <input required readonly="true" name="id" value="<?=$data['id'] ?>" type="text"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input required name="name" value="<?=$data['name'] ?>" type="text"
                                    class="form-control">
                            </div>


                            <div class="col-md-12 mb-3">
                                <Button class="btn btn-primary" name="edit-category" type="submit">Submit</Button>
                            </div>
                        </div>
                    </form>
                    
                    <?php
                        }

                    }else{
                        ?>
                    <h4>No Record found</h4>
                    <?php
                    }
               
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