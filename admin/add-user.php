<?php 
include('authentication.php');
include('include/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">

        <div class="col-md-12 mb-3">
        <?php
         include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <a href="view-user.php" class="btn btn-primary float-end">Back</a>
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input required name="username" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input required name="email" type="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Password</label>
                                <input required name="password" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">....Select Role.....</option>
                                    <option value="1">admin</option>
                                    <option value="0">user</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <Button class="btn btn-primary" name="add-user" type="submit">Submit</Button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include('include/footer.php');
include('include/scripts.php');
?>