 <?php
 include "connection.php";
    session_start();

     ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title></title>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    </head>
    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
              <a class="navbar-brand active">LIBRARY MANAGEMENT SYSTEM</a>
          </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>

            <li><a href="books.php">BOOKS</a></li>
            <li><a href="profile.php">MY-PROFILE</a></li>
            <li><a href="report.php">FEEDBACK</a></li>

         </ul>

  <?php

        if(isset($_SESSION['login_user']))
          {
            $sql="SELECT COUNT(status) as total FROM messages where status='no' and username='$_SESSION[login_user]' and who='user'";
            $res=mysqli_query($db,$sql);
            $row=mysqli_fetch_assoc($res);


         ?>
        <ul class="nav navbar-nav navbar-right">
      <!--    <li><a><p style="color:#ff1503;font-size: 20px;" id="demo"></p></a></li>-->
          <li><a href="message.php"><span  class="glyphicon glyphicon-envelope"></span><span class="badge bg-green"><?php echo $row["total"]; ?></span></a></li>
        <li><a href="student_logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
          </ul>

          <!--_________________-timer___________________________-->
          <?php
          $q="SELECT * FROM `timer` where username='$_SESSION[login_user]' ORDER BY `timer`.`tm` ASC limit 0,1";
          $result=mysqli_query($db,$q);
          $row=mysqli_fetch_assoc($result);
          //if(mysqli_num_rows($row)>0){

           ?>


          <script type="text/javascript">
              // the date we're counting down to
          //  var countDownDate = new Date("<?php echo $row["tm"]; ?>").getTime();
            var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
              if (distance < 0)
              {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
              }
            }, 1000);

          </script>

          <?php

       }
       /*-----------------------------------------------*/
        else
       {
         ?>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="student_registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
         <?php
          }
           ?>
           </div>
        </nav>

    </body>
    </html>
