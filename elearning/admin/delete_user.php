<?php
$id=$_GET["id"];
include("db.php");
$sql="delete from user where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('User deleted succesfully');window.location.replace('view_students.php');</script>";
}
else
{
    echo "<script>alert('Error to delete user');window.location.replace('view_students.php');</script>";
}
?>