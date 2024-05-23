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

<div style="width:80%;height:150vh;float:right;" class="px-5 mt-5">
<h3 class="text text-primary font-weight-bold">Add Lessons</h3>
<div class="conatainer-fluid">
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1" required name="course_id">
    <option value="">Choose Lessons</option>
<?php
include("db.php");
$sql23="select * from course";
$result23=mysqli_query($con,$sql23);
if(mysqli_num_rows($result23)>0)
{
    while($row=mysqli_fetch_assoc($result23))
    {
        ?>   
    <option value="<?=$row['id']?>"><?=$row["name"]?></option>
        <?php
    }
}
?>
  </select>
</div>
  <div class="form-group">
    <label for="pwd">Lesson name:</label>
    <input type="text" class="form-control" placeholder="Enter lesson name" required name="lesson_name" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Lesson Description:</label>
    <input type="text" class="form-control" placeholder="Enter lesson description" required name="lesson_description" id="pwd">
  </div>

  <div class="form-group">
    <label for="pwd">Lesson video file:</label>
    <input type="file" class="form-control" name="lesson_video" id="pwd" required>
  </div>
  <button type="submit" name="add_lessons" class="btn btn-success">Add Lesson</button>
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
if(isset($_POST["add_lessons"]))
{
$course_id=$_POST["course_id"];
$lesson_name=$_POST["lesson_name"];
$lesson_description=$_POST["lesson_description"];
$target_dir="lessons/";
$target_file=$target_dir.basename($_FILES["lesson_video"]["name"]);
if(strstr($target_file,".mp4"))
{
if(move_uploaded_file($_FILES["lesson_video"]["tmp_name"],$target_file))
{
    include("db.php");
    $sql="insert into lesson values (NULL,$course_id,'$lesson_name','$lesson_description','$target_file',NULL)";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('Lesson added successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error to add a lesson');</script>";
    }
}
else
{
    echo "<script>alert('Error to upload video');</script>";
}
}
else
{
    echo "<script>alert('Invalid video format upload only MP4 format...');</script>";
}
}
?>
</body>
</html>