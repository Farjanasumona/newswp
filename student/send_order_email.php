

<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>

<!DOCTYPE html>
<html>
<head>
 <title></title>
 <style type="text/css">
 body
 {
   height: 655px;
   background-image: url("images/d.jpg");
   background-repeat: no-repeat;

 }
   .wrapper
   {

     padding: 10px;
     width:1000px;
     height: 610px;
     margin:-30px auto;
     background-color: #01062b;
     opacity:.9;
       filter:alpha(opacity=60);
       color :#fff;
   }
   .form-control
   {
     width: 60%;
     height: 70px;
   }
 </style>
</head>
<body>
 <?php require_once('include1/navbar.php'); ?>

 <?php require_once('include/jumbotron.php'); ?>
<div class="wrapper">
 <h4>Send message to admin.</h4>
 <form style="" action="" method="post">
     <input class="form-control" type="text" name="message" placeholder="Write something..."><br>
     <input class="btn btn-default" type="submit" name="submit" value="Send"><br><br>
   </form>
   <?php
   if(isset($_POST['submit']))
     {
       if(isset($_SESSION['login_user']))
     {
       $sql="INSERT INTO `lms`.`messages` VALUES ('','$_SESSION[login_user]', '$_POST[message]','no','admin');";
       if(mysqli_query($db,$sql))
       {
         $q="SELECT * FROM messages where username='$_SESSION[login_user]' and who='user' order by id DESC";
       $res=mysqli_query($db,$q);

       echo "<table class='table table-bordered table-responsive'>";
       while ($row=mysqli_fetch_assoc($res))
           {
       echo "<tr>";
               echo "<td>"; echo 'admin'; echo ":</td>";

               echo "<td>"; echo $row['message']; echo "</td>";
             echo "</tr>";

         }
       echo "</table>";

       }}
     else
     {
       ?>
       <script type="text/javascript">
         alert("You need to login  to send message.");
       </script>
       <?php
     }
   }
   else
   {
     if(isset($_SESSION['login_user']))
     {
       $q="SELECT * FROM messages where username='$_SESSION[login_user]' and who='user' order by id DESC";
       $res=mysqli_query($db,$q);

       echo "<table class='table table-bordered table-responsive'>";
       while ($row=mysqli_fetch_assoc($res))
           {
       echo "<tr>";
               echo "<td>"; echo 'admin'; echo ":</td>";

               echo "<td>"; echo $row['message']; echo "</td>";
             echo "</tr>";

         }
       echo "</table>";

   $sql="UPDATE messages set status='yes' WHERE who='user' and username='$_SESSION[login_user]'";
       mysqli_query($db,$sql);
    }
 }
    ?>
</div>

</body>
</html>
