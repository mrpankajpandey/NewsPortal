<?php
session_start();
if(isset($_POST['logout'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);
   $_SESSION['message'] = "Logout Successfully";
   header("Location: index.php");
   exit();
}
?>