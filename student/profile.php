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
      ?><form action="" method="post">
      <input style="float:right;" class="btn btn-default" type="submit" name="submit1" value="Edit Profit"><br><br>
      </form><?php
    }
    ?>
<div class="wrapper ">

    <?php

      if(isset($_SESSION['login_user']))
        {$q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]'");
         ?><h2 class="text-center">Profile information</h2><br>
          <?php



          $row=mysqli_fetch_assoc($q);
          $_SESSION['pic']=$row['image'];

          if(isset($_SESSION['login_user']))
                {
                  echo "<div class='pic text-center'><img class='img-circle profile_img' height=110 width=120 src='images/".$_SESSION['pic']."'></div> ";
                }
                echo "<br><br><br>";
        echo "<div class='box' style='padding-left:180px'>";

            echo "<tr>";
            echo "<h4>"; echo "<b>First Name: &nbsp </b>"; echo $row['firstname']; echo "</h4>";
            echo "</tr>";

      echo "<tr>";
            echo "<h4>"; echo "<b>Last Name:   &nbsp&nbsp </b>"; echo $row['lastname']; echo "</h4>";
            echo "</tr>";

            echo "<tr>";
            echo "<h4>"; echo "<b>Username:   &nbsp&nbsp&nbsp  </b>"; echo $row['username']; echo "</h4>";
            echo "</tr>";

            echo "<tr>";
            echo "<h4>"; echo "<b>Password:   &nbsp&nbsp&nbsp  </b>"; echo $row['password']; echo "</h4>";
            echo "</tr>";

            echo "<tr>";
            echo "<h4>"; echo "<b>Semester:   &nbsp &nbsp&nbsp  </b>"; echo $row['sem']; echo "</h4>";
            echo "</tr>";

            echo "<tr>";
            echo "<h4>"; echo "<b>email:   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b>"; echo $row['email']; echo "</h4>";
            echo "</tr>";

            echo "<tr>";
            echo "<h4>"; echo "<b>Contact:  &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp  </b>"; echo $row['contact']; echo "</h4>";
            echo "</tr>";

        echo "</div>";}
        else
        {
          echo "<h3>You need to login first</h3>";
        }

  if(isset($_POST['submit1']))
  { ?>

         <script type="text/javascript">window.location="st_profile.php"</script>

        <?php
  }


  ?>
  </div>
</div>

 </body>
 </html>
