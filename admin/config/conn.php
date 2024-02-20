<?php 
$conn = mysqli_connect("localhost", "root", "", "newsApp");

if(!$conn){
    echo"db not connected";
    header("Location:../error/dberror.php");
}
?>