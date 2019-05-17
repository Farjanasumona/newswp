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
  <?php require_once('include1/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<!--______________sidebar image___________-->
 <div class="clearfix">
    <div class="profile clearfix" style="padding-left: 35px;">
      <div class="profile_pic">

        <?php

        if(isset($_SESSION['login_user']))
          {echo "<div class='pic'><img class='img-circle profile_img' height=100 width=110 src='images/".$_SESSION['pic']."'></div> ";}
        else
        {
            echo "<div class='pic'><img class='img-circle profile_img' height=100 width=110 src=images/44.png> </div><br>";
        }

         ?>

      </div><br><br>

      <?php
          if(isset($_SESSION['login_user']))
            {
              ?>
                <div class="profile_info">
                 <span style="color: white">Welcome,</span>

                  <h4 style="color: white"><?php echo $_SESSION['login_user'];?></h4>
                </div>
              <?php

            }
            else
            {
              ?>
                <div class="profile_info">
                 <span style="color: white">Welcome, USER</span>

                  <h4 style="color: white">Please login</h4>
                </div>
                 <?php
            }
       ?>


      <div class="clearfix"></div>
    </div>
  </div><br><br>
<!---->

  <div class="h" style="padding-left: 48px;"><a href="profile.php">My Profile</a></div>
  <div class="h" style="padding-left: 48px;"><a href="add_books.php">Add Books</a></div>
  <div class="h" style="padding-left: 48px;"><a href="delete_books.php">Delete Books</a></div>
</div>
<span style="padding-left: 100px;font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div id="main">

  <div class="container">
    <h2 style="font-family:Lucida Console;color:#333;">Add New Books</h2>

  <form class="book" action="" method="post">
    <input class="form-control" type="text" name="name" placeholder="Book Name" required=""> <br>
    <input  class="form-control" type="text" name="authors" placeholder="Author's Name" required=""> <br>
    <input  class="form-control" type="text" name="edition" placeholder="Edition" required=""><br>

    <input  class="form-control" type="text" name="quantity" placeholder="Quantity" required=""><br>
    <input  class="form-control" type="text" name="department" placeholder="Department" required=""> <br>
    <input   class="btn btn-default" type="submit" name="submit" value="ADD">
  </form>

</div>



  <?php
      if(isset($_POST['submit']))
      {
        if(isset($_SESSION['login_user']))

        {

          mysqli_query($db,"INSERT INTO `lms`.`books` VALUES ('', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', 'available', '$_POST[quantity]', '$_POST[department]');");
        ?>

                <script type="text/javascript">
                    alert("Added successfully");
                </script>

        <?php
      }
      else
      {
         ?>

                <script type="text/javascript">
                    alert("You need to log in first!");
                </script>
          <?php
      }
      }
       ?>
    </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#598860";
}
</script>

</body>
</html>
