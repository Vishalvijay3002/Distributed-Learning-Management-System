<?php
$id=$_GET["id"];
include("db.php");
$sql="delete from tutor where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Tutor deleted succesfully');window.location.replace('view_tutors.php');</script>";
}
else
{
    echo "<script>alert('Error to delete tutor');window.location.replace('view_tutors.php');</script>";
}
?>