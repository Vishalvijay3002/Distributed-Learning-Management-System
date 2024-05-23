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
<?php
include("db.php");
$sql="select count(*) as total from user";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);


$sql4="select count(*) as total from tutor";
$result4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_assoc($result4);


$sql2="select count(*) as total from course";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);


$sql3="select count(*) as total from payment";
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($result3);
?>
<div style="width:80%;height:100vh;float:right;" class="px-5 mt-5">
<div class="conatainer-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-danger text-white text-center" style="font-size:20px;">
                <div class="card-body">Courses<br><?=$row2["total"]?></div>
            </div>
        </div>
        <div class="col-md-4">
            
        <div class="card bg-success text-center text-white" style="font-size:20px;">
                <div class="card-body">Students<br><?=$row["total"]?></div>
            </div>
        </div>
        <div class="col-md-4">
            
        <div class="card bg-primary text-center text-white" style="font-size:20px;">
                <div class="card-body">Sold<br><?=$row3["total"]?></div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            
        <div class="card bg-warning text-center text-white" style="font-size:20px;">
                <div class="card-body">Tutors<br><?=$row4["total"]?></div>
            </div>
        </div>
    </div>
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

</body>
</html>