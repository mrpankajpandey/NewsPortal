

<?php
include('authentication.php');



// edit post 
if(isset($_POST['edit-post'])){
    
    if(empty($_FILES['new-image'])){
        $file_name = $_POST['old-image'];
        echo $file_name;
    }else{
        
    $post_id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['title'];
 
  
    $description= $_POST['description'];
    //  $date = date('d M, Y');
//    $author =  $_SESSION['auth_user']['user_id'];
   $file_name = $_FILES['new-image']['name'];
   $file_size = $_FILES['new-image']['size'];
   $file_tmp = $_FILES['new-image']['tmp_name'];
   $file_type = $_FILES['new-image']['type'];
   $file_ext= strtolower(end(explode('.',$file_name)));
   echo $file_ext;
   $extension = array("jpeg","jpg","png");
   if(in_array($file_ext, $extension) === false){
    $_SESSION['message'] = "This Extension file Not Allowed";
    header('Location: edit-post.php?id='.$post_id);
    exit(0);
   }
   elseif($file_size > 2097152) {
    $_SESSION['message'] = "File Size must be 2MB or Lower";
    header('Location: edit-post.php?id='.$post_id);
    exit(0);
   }else{
    move_uploaded_file($file_tmp, "uploads/".$file_name);
    echo $sql = " UPDATE post SET  name='$name', description = '$description', category =  '$category',  image =   '$file_name' WHERE id = '$post_id' ";
    // $sql .= "UPDATE category SET post = post +1 WHERE id = $category";
    $run = mysqli_query($conn, $sql) or die("Sql Failed");
    if($run){
        $_SESSION['message'] = "Post added Successfully";
        header("Location:view-post.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Something went Wrong";
       
        header('Location: edit-post.php?id='.$post_id);
         exit(0);
    }


   }

}
}
//add post 

if(isset($_POST['add-post'])){
    
    $category = $_POST['category'];
    $name = $_POST['title'];
 
  
    $description= $_POST['description'];
     $date = date('d M, Y');
   $author =  $_SESSION['auth_user']['user_id'];
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp = $_FILES['image']['tmp_name'];
   $file_type = $_FILES['image']['type'];
   $file_ext= strtolower(end(explode('.',$file_name)));
   $extension = array("jpeg","jpg","png");
   
   if(in_array($file_ext,$extension) === false){
    $_SESSION['message'] = "This Extension file Not Allowed";
    header("Location:add-post.php");
    exit(0);
   }elseif($file_size > 2097152) {
    $_SESSION['message'] = "File Size must be 2MB or Lower";
    header("Location:add-post.php");
    exit(0);
   }else{
    move_uploaded_file($file_tmp, "uploads/".$file_name);
    $sql = "INSERT INTO post(title, description , category , date , image, author) VALUES('$name', '$description', '$category', '$date', '$file_name', '$author')";
   
    if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "Post added Successfully";
        header("Location:view-post.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Something went Wrong";
       
        header("Location:add-post.php");
         exit(0);
    }


   }

 
}
// delete category 
if(isset($_POST['delete-category'])){
    $id = $_POST['delete-category'];
    $sql = "DELETE FROM category WHERE id = $id ";
    $run = mysqli_query($conn, $sql );
    if($run){
        $_SESSION['message']= "Category deleted Successfully!";
        header('Location: view-category.php');
        exit(0);

    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: view-category.php');
        exit(0);
    }

}
// edit category 
if(isset($_POST['edit-category'])){
    $id  =$_POST['id'];
    $name = strtlower($_POST['name']);
    $check_category = "SELECT name FROM category  WHERE name ='$name'";
    $check_category_run = mysqli_query($conn, $check_category);
    
    if(mysqli_num_rows($check_category_run) > 0){
         $_SESSION['message']= "Category already Exists";
        header('Location: edit-category.php');
        exit(0);
    }else{
            
        $sql = "UPDATE category SET name = '$name' WHERE id = '$id' ";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $_SESSION['message']= "Category Update Successfully";
            header('Location: view-category.php');
            exit(0);
        }else{
            $_SESSION['message']= "Something Went Wrong !";
            header('Location: edit-category.php?id='.$id);
            exit(0);
        }

    }

}
// add category 
if(isset($_POST['add-category'])){
    $name = strtolower($_POST['name']);
    $date = date('d M, Y');
   
    $check_category = "SELECT name FROM category  WHERE name ='$name'";
    $check_category_run = mysqli_query($conn, $check_category);
    
    if(mysqli_num_rows($check_category_run) > 0){
         $_SESSION['message']= "Category already Exists";
        header('Location: edit-category.php');
        exit(0);
    }else{
    $query= "INSERT INTO category (name, date ) VALUES('$name', '$date')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message']= "Category Added Successfully";
        header('Location: view-category.php');
        exit(0);
    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: add-category.php');
        exit(0);
    }
}
}
// delete user 
if(isset($_POST['user_delete'])){
    $user_id=$_POST['user_delete'];
    $query = "DELETE FROM users WHERE id=$user_id " ;
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message']= "User / Admin deleted Successfully!";
        header('Location: view-user.php');
        exit(0);

    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: view-user.php');
        exit(0);
    }

}
//Add user 
if(isset($_POST['add_user'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $status= $_POST['status'] == true ? '1':'0';
  

    $checkemail = "SELECT email FROM users  WHERE email ='$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);
    
    if(mysqli_num_rows($checkemail_run) > 0){
         $_SESSION['message']= "already Email Exists";
        header('Location: add-user.php');
        exit(0);
    }else{
         $query = "INSERT INTO users(username, email, password, role , status) VALUES('$name', '$email', '$password', '$role', '$status')";
        $query_run = mysqli_query($conn, $query);
      if($query_run){
        $_SESSION['message']= "Admin/User Added Successfully";
        header('Location: view-user.php');
        exit(0);
       }
       else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: add-user.php');
        exit(0);
            }
    
        
    }
}


// update user 
if(isset($_POST['edit-user'])){
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Oldpassword = $_POST['password'];
    $Newpassword = $_POST['Newpassword'];
    $role= $_POST['role'];
  

    $query = "SELECT password FROM users  WHERE password ='$Oldpassword'";
    $query_run = mysqli_query($conn, $query);
     $old=  mysqli_fetch_array($query_run);
     $oPass= $old['password'];
      echo "$OPass";

    if($oPass == $Oldpassword){
        
         $query =" UPDATE users SET name='$name', email='$email', password='$Newpassword' WHERE id= '$user_id' ";

           $query_run =  mysqli_query($conn, $query);
   
         if($query_run){
             $_SESSION['message'] = "Updated Successfully";
              header('Location:view-user.php');
                exit(0);
            }
            else{
                $_SESSION['message']= "Something Went Wrong !";
                  header('Location: edit-user.php?id='.$user_id);
                 exit(0);
               }

    }
    else{
        $_SESSION['message'] = "Password Dos'nt match !";
        header('Location:edit-user.php?id='.$user_id);
        exit(0);
    }
}


// add user 
if(isset($_POST['add-user'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $role = $_POST['role'];

    $sql = "SELECT email FROM users WHERE email='$email' ";
    $run = mysqli_query($conn, $sql);
    if(mysqli_num_rows($run) > 0){
         $_SESSION['message'] = "User Already Registered!";
         header("Location: add-user.php");
         exit(0);
    }else{
        $query = "INSERT INTO users(name, email, password, role ) VALUES('$name', '$email', '$password', '$role')";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            $_SESSION['message'] = "User Registred Successfully !";
            header("Location:view-user.php");
            exit(0);
        }else{
           
            $_SESSION['message']= "Something Went Wrong !";
            header('Location: add-user.php');
            exit(0);
        }
    }

}

?>