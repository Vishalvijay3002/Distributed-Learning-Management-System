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
    <title>E-Learning Edit courses</title>   
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
        height:150vh;
        
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
$sql2="select * from course where id=".$_GET["id"];
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
?>
<div style="width:80%;height:150vh;float:right;" class="px-5 mt-5">
<h3 class="text text-primary font-weight-bold">Edit Course</h3>
<div class="conatainer-fluid">
<img src="<?=$row2['course_image']?>" style="height:200px;width:300px;">
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pwd">Course name:</label>
    <input type="text" class="form-control" placeholder="Enter course name" value="<?=$row2['name']?>" name="name" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="pwd">Course Description:</label>
    <input type="text" class="form-control" placeholder="Enter course description" value="<?=$row2['description']?>" required name="description" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Author:</label>
    <input type="text" class="form-control" placeholder="Enter author name" name="author" value="<?=$row2['author']?>" required id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Course Duration:</label>
    <input type="text" class="form-control" placeholder="Enter course duration" required name="duration" value="<?=$row2['duration']?>" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Course Original price:</label>
    <input type="number" class="form-control" placeholder="Enter original price" required value="<?=$row2['original_price']?>" name="original_price" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Selling price:</label>
    <input type="number" class="form-control" placeholder="Enter selling price" required name="selling_price" value="<?=$row2['selling_price']?>" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Choose image:</label>
    <input type="file" class="form-control" name="course_image" id="pwd">
  </div>
  <button type="submit" name="edit_course" class="btn btn-success">Update Course</button>
</form>
</div>

</div>
  <div style="width:20%;height:150vh;" class="bg-info">
  <?php
  include("leftbar.php");
  ?>
  </div>


<!-- content end -->


</div>
</div>
</div>
<?php
error_reporting(0);
if(isset($_POST["edit_course"]))
{
$name=$_POST["name"];
$description=$_POST["description"];
$author=$_POST["author"];
$duration=$_POST["duration"];
$original_price=$_POST["original_price"];
$selling_price=$_POST["selling_price"];
$target_dir="course_image/";
if($_FILES["course_image"]["name"]=="")
{
    $sql3="update course set name='$name',description='$description',author='$author',duration='$duration',original_price='$original_price',
    selling_price='$selling_price' where id=".$_GET["id"];
    if(mysqli_query($con,$sql3))
            {
                echo "<script>alert('Course updated successfully');window.location.replace(window.location.href);</script>";
            }
            else
            {
                echo "<script>alert('Error to update a course');window.location.replace(window.location.href);</script>";
            }
}
else
{
    $target_file=$target_dir.basename($_FILES["course_image"]["name"]);
    if(strstr($target_file,".jpg") || strstr($target_file,".png") || strstr($target_file,".jpeg"))
    {
        if(move_uploaded_file($_FILES["course_image"]["tmp_name"],$target_file))
        {
            $sql3="update course set name='$name',description='$description',author='$author',duration='$duration',original_price='$original_price',
            selling_price='$selling_price',course_image='$target_file' where id=".$_GET["id"];
            if(mysqli_query($con,$sql3))
            {
                echo "<script>alert('Course updated successfully');window.location.replace(window.location.href);</script>";
            }
            else
            {
                echo "<script>alert('Error to update a course');window.location.replace(window.location.href);</script>";
            }
        }
        else
        {
            echo "<script>alert('Error to upload a image file');</script>";
        }
    }
    else
    {
        echo "<script>alert('Please upload Image files only JPG,PNG,JPEG');</script>";
    }
}
}
?>
</body>
</html>