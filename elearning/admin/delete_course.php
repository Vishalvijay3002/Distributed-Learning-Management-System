<?php
$id=$_GET["id"];
include("db.php");
$sql="delete from course where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Course deleted succesfully');window.location.replace('view_courses.php');</script>";
}
else
{
    echo "<script>alert('Error to delete course');window.location.replace('view_courses.php');</script>";
}
?>