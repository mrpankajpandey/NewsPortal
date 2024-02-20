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
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                <?php
                if(isset($_GET['id'])){
                  
                    $user_id = $_GET['id'];
                    
                    $user_query = "SELECT * FROM users WHERE id ='$user_id' ";
                    $user_query_run = mysqli_query($conn, $user_query);

                    if(mysqli_num_rows($user_query_run) > 0){

                        foreach($user_query_run as $user){
                            ?>
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="name" class="form-label">ID</label>
                                <input required readonly="true" name="id" value="<?=$user['id'] ?>" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input required name="name" value="<?=$user['name'] ?>" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input required name="email" value="<?=$user['email'] ?>" type="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">New Password</label>
                                <input required name="Newpassword" value="" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Old Password</label>
                                <input required name="password" value="<?=$user['password'] ?>" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Role</label>
                                <select name="role" id="" class="form-control">
                                <option value="">....Select Role.....</option>
                                <option value="1" <?= $user['role']=="1" ? 'selected': '' ?>>admin</option>
                                <option value="0"  <?= $user['role']=="0" ? 'selected': '' ?> >user</option>
                            </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <Button class="btn btn-primary" name="edit-user" type="submit">Submit</Button>
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