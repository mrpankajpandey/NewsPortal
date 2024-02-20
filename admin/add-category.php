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
                    <a href="view-category.php" class="btn btn-primary float-end">Back</a>
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">
                        <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                             <label for="" class="form-label">Name</label>
                             <input required type="text" name="name" class="form-control">
                        </div>
                       
                        <div class="col-md-12 mb-3 form-group">
                             
                            <button type="submit" name="add-category" class="btn btn-primary">Submit</button>
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