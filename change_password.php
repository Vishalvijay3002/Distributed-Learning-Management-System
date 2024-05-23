<?php
session_start();
if(!isset($_SESSION["aid"]))
{
    echo "<script>window.location.replace('admin.php');</script>";
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

<!-- content start -->

<div style="width:80%;height:100vh;float:right;" class="px-5 mt-5">
<h3 class="text text-primary font-weight-bold">Update password</h3>
<div class="conatainer-fluid">
<form action="" method="post">
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
  </div>
  <button type="submit" name="change_password" class="btn btn-success">Update</button>
  <button type="reset" class="btn btn-danger ml-3">Reset</button>
</form>
</div>

</div>
  <div style="width:20%;height:100vh;" class="bg-info">
  <?php
  include("leftbar.php");
  ?>
  </div>


<!-- content end -->


</div>
</div>
</div>
<?php
if(isset($_POST["change_password"]))
{
$password=$_POST["password"];
include("db.php");
$sql="update admin set password='$password' where id=".$_SESSION["aid"];
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Password updated successfully');</script>";
}
else
{
    echo "<script>alert('Error to update a password');</script>";
}
}
?>
</body>
</html>