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
                    <a href="view-post.php" class="btn btn-danger float-end"> Back</a>
                    <h4>Add Post </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Category List</label>
                                <?php $category = "SELECT * FROM category  ";
                            $category_run = mysqli_query($conn, $category);
                               if(mysqli_num_rows($category_run) > 0){

                                ?>
                                <select name="category" required class="form-control" id="">
                                    <option required disabled value="">....Select Category....</option>
                                    <?php foreach($category_run as $category_item){
                                           ?>
                                    <option value="<?= $category_item['id'] ?>"> <?= $category_item['name'] ?> </option>
                                    <?php
                                    }
                              
                                ?>
                                </select>

                                <?php

                               }else{
                                     ?>
                                <h5>No Category is Avialble</h5>
                                <?php 
                               }
                             ?>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Title</label>
                                <input required type="text" required value="" name="title" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label"> Description</label>
                                <textarea id="summe" required type="textarea" name="description"
                                    class="form-control"> </textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label"> Image</label>
                                <input type="file" name="image" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <Button class="btn btn-primary" name="add-post" type="submit">Save Post</Button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>


    </div>
</div>


<?php
include("include/footer.php");
include("include/scripts.php");

?>