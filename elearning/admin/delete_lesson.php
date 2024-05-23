<?php
$id=$_GET["id"];
include("db.php");
$sql="delete from lesson where lid=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Lesson deleted succesfully');window.location.replace('view_lessons.php');</script>";
}
else
{
    echo "<script>alert('Error to delete lesson');window.location.replace('view_lessons.php');</script>";
}
?>