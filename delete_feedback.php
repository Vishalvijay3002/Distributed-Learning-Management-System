<?php
$id=$_GET["id"];
include("db.php");
$sql="delete from feedback where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Feedback deleted succesfully');window.location.replace('view_feedback.php');</script>";
}
else
{
    echo "<script>alert('Error to delete a feedback');window.location.replace('view_feedback.php');</script>";
}
?>