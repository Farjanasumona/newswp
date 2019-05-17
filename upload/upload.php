<?php
include "connection.php";




 ?>


<?php require_once('include/top.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
    background-color: #598860;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 51px;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.profile_pic {

    width: 60%;
    float: left;
}
.img-circle.profile_img {
    width: 70%;
    background: #fff;
    margin-left: 15%;
    z-index: 1000;
    position: inherit;
    margin-top: 20px;
    border: 1px solid #141415;
    padding: 4px;
}
.h:hover
{
  color:#f1f1f1;
  box-shadow: #715a58 0 1px 0, inset rgba(255,255,255,.16) 0 1px 0;
  width: 248px;
  height: 50px;

  background-color:  #0a4c30;
}
.srch
{

  padding-left: 984px;
}
.book
{
  width:400px;
}

.form-control
{
  background-color: #c6deb7;
}
</style>
</head>
<body>
  <?php require_once('include/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>

<div id="main">

  <div class="container">
    <h2 style="font-family:Lucida Console;color:#333;">Add New Document</h2>
<!--<form action="upload.php" method="post" enctype="multipart/form-data">-->
  <form class="book" action="upload.php" method="post" enctype="multipart/form-data" >
    <input class="form-control" type="text" name="doc_name" placeholder="Document  Name" required=""> <br>
      <input class="form-control" type="text" name="dept" placeholder="Department" required=""> <br>
    <!--
    <input type="file" name="myfile">
    <input type="submit" name="submit" value="Upload">-->
    <input class="form-control" type="file" name="myfile"> <br>
    <input   class="btn btn-default" type="submit" name="submit" value="UPLOAD">
  </form>

</div>
<?php
if(isset($_POST['submit'])){
  $doc_name = $_POST['doc_name'];
  $dept=$_POST['dept'];
  $name=$_FILES['myfile']['name'];
  $tmp_name=$_FILES['myfile']['tmp_name'];
  if($name){
    $location="documents/$name";

    move_uploaded_file($tmp_name,$location);
    $query=mysqli_query($db,"INSERT INTO documents (name,path,dept) VALUES('$doc_name','$location','$dept')");

  }
  else {
    die("please select a file");
  }


if ($query) {

                           ?>
                               <script type="text/javascript">
                               	alert("Added successfully");
                               </script>
                             <script type="text/javascript">window.location="upload.php"</script>
                           <?php

                       }

   			}
   		 ?>



    </div>


</body>
</html>
