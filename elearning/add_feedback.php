<?php
session_start();
if(!isset($_SESSION["uid"]))
{
    echo "<script>window.location.replace('index.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning</title>   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .body
    {
        background-image:url("images/bg.webp");
        background-repeat:no-repeat;
        background-size:100% 100%;
        height:100vh;
        overflow:hidden;
    }
    .myred
    {
        background-color:rgba(255,255,255,1);
        height:100vh;
    }
    textarea
    {
        resize:none;
    }
    .nav-link
    {
        color:white;
    }
    .nav-link:hover
    {
        color:white;
    }
    .flex-column .nav-item:hover
    {
        background-color:red;
    }
</style>
</head>
<body>
<?php
include("header.php");
?>
<div class="body">
<div class="myred">
<?php
include("db.php");
$sql123="select * from user where id=".$_SESSION["uid"];
$result123=mysqli_query($con,$sql123);
$row123=mysqli_fetch_assoc($result123);
?>
<!-- content start -->

<div style="width:80%;height:100vh;float:right;" class="px-5 mt-5">
<h3 class="text-info">Feedback Form</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">Student Id:</label>
        <input type="text" readonly class="form-control" name="id" value="<?=$row123['id']?>" placeholder="Enter user id" id="email" required>
    </div>
    <div class="form-group">
        <label for="email">Write Feedback:</label>
        <textarea rows="5" class="form-control" name="comments" required placeholder="Enter your comments here"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</div>
  <div style="width:20%;height:100vh;" class="bg-dark">
  <?php
  include("leftbar.php");
  ?>
  </div>


<!-- content end -->


</div>
</div>
</div>
<?php
if(isset($_POST["update"]))
{
    $comments=$_POST["comments"];
    include("db.php");
    $uid=$_SESSION["uid"];
    $sql5="insert into feedback values (NULL,$uid,'$comments',NULL)";
    if(mysqli_query($con,$sql5))
    {
        echo "<script>alert('Feedback Submitted successfully')</script>";
    }
    else
    {
        echo "<script>alert('Error to update a password')</script>";
    }
}
?>
</body>
</html>