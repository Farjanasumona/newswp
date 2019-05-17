<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>profile page</title>
  <style type="text/css">
    .wrapper
    {
      width:700px;
      margin:0 auto;
    }
    .text-center
    {
      text-align: center;
    }
    .box
    {
      width: 550px;
      margin:0 auto;
    }

  </style>
 </head>
 <body style="background-color: #2d6548;color: #fff;">
   <?php require_once('include1/navbar.php'); ?>

   <?php require_once('include/jumbotron.php'); ?>
  <div class="container">
     <?php
     if(isset($_SESSION['login_user']))
    {

    }


        else
        {
          echo "<h3>You need to login first</h3>";

        }
?>
  </div>
</div>

 </body>
 </html>
