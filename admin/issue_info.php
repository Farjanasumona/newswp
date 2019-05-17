<?php
include "connection.php";
 ?>


<?php require_once('include/top.php'); ?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
    background-image: url("images/c.jpg");
    background-repeat: no-repeat;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 51px;
    left: 0;
    background-color: #000;
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

@media screen and (max-height: 400px) {
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
  width: 500px;
  background-color: #000;
  color:#fff;
}
.wrapper
    {
      padding: 20px;
      width:100%;
      height: 610px;
      	margin:-30px auto;
      
      background-color: #000000;
      opacity:.8;
      filter:alpha(opacity=60);
      color :#fff;
    }
    .h:hover
{
  color:#f1f1f1;
  box-shadow: #715a58 0 1px 0, inset rgba(255,255,255,.16) 0 1px 0;
  width: 248px;
  height: 50px;

  background-color:  #0a4c30;
}
.scroll
    {
      width: 100%;
      height:300px;
      overflow: auto;
    }


</style>
</head>
<body>
  <?php require_once('include1/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>

  <div class="wrapper">
    <div id="main">

      <form style="padding-left: 781.5px;" action="" method="post">
        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
        <input class="form-control" type="text" name="bid" placeholder="bid" required=""><br>

        <input style="float: right;" class="btn btn-default" type="submit" name="submit1" value="  Notify whose return date is tomorrow..">
        <input style="float: right;" class="btn btn-default" type="submit" name="submit2" value="  Mark whose return time has expired... ">
        <input style="float: right;" class="btn btn-default" type="submit" name="submit3" value="  User who has returned the book ....... ">


      </form><br>

      <span style="padding-left: 15px;font-size:30px;color: #fff ;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <!--______________sidebar image___________-->
     <div class="clearfix">
        <div class="profile clearfix" style="padding-left: 35px;">
          <div class="profile_pic">

            <?php

            if(isset($_SESSION['login_user']))
              {echo "<div class='pic'><img class='img-circle profile_img' height=100 width=120 src='images/".$_SESSION['pic']."'></div> ";}
            else
            {
                echo "<div class='pic'><img class='img-circle profile_img' height=100 width=120 src=images/44.png> </div><br>";
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
//------------------------------------------------------------------------------------------
              if(isset($_POST['submit1']))
              {
                $q="INSERT INTO `lms`.`messages` VALUES ('','$_POST[username]','Return date of your issued book is tomorrow. Please return in time.','no','user');";
                  if(mysqli_query($db,$q))
                  {
                    ?> <script type="text/javascript">
                        alert("Notification Sent");
                      </script>
                    <?php
                  }
              }
              if(isset($_POST['submit2']))
              {
                $var='<p style="color:yellow;background-color:red">EXPIRED<p>';
                  $SQL="UPDATE issue SET approve='$var' where username='$_POST[username]' and bid='$_POST[bid]'";
                  mysqli_query($db,$SQL);
                  $Q="DELETE from timer where username='$_POST[username]' and bid='$_POST[bid]'";
                   mysqli_query($db,$Q);
              }

              //-----------------------------------quantity--------------------------------------------
              if(isset($_POST['submit3']))
              {
                  $v='<p style="color:#000;background-color:#2afe00">RETURNED<p>';
                  $QL="UPDATE issue SET approve='$v' where username='$_POST[username]' and bid='$_POST[bid]'";
                  mysqli_query($db,$QL);
                  $ql="DELETE from timer where username='$_POST[username]' and bid='$_POST[bid]'";
                  mysqli_query($db,$ql);

                  mysqli_query($db,"UPDATE `books` SET quantity = quantity+1,status='available' where bid='$_POST[bid]';");
              }
           ?>


          <div class="clearfix"></div>
        </div>
      </div><br><br>
<!---->

  <div class="h" ><a href="profile.php">My Profile</a></div>
  <div class="h" ><a href="issue_book.php">Book Request</a></div>
  <div class="h" ><a href="issue_info.php">Book Issue Info</a></div>

</div>

<!--_____________________________________________________________________-->

  <h3>Information related to book issue</h3>
  <div class="scroll">
  <?php
      if(isset($_SESSION['login_user']))
      {
          $sql = "SELECT sid, student.username, sem, roll, books.bid, name, authors, edition, department, issue.approve, issue.issue_date, issue.return_date FROM student INNER JOIN issue ON student.username = issue.username INNER JOIN books ON issue.bid = books.bid WHERE not issue.approve =  '' ORDER BY  `issue`.`return_date` ";
        $res=mysqli_query($db,$sql);

        echo "<table style='opacity:1;filter:alpha(opacity=60);' class='table table-bordered '>";
          echo "<tr style='background-color: #0a502f;'>";
                echo "<th>"; echo "sid"; echo "</th>";
                echo "<th>"; echo "username"; echo "</th>";
                echo "<th>"; echo "sem"; echo "</th>";
                echo "<th>"; echo "roll"; echo "</th>";
                echo "<th>"; echo "bid"; echo "</th>";
                echo "<th>"; echo "Book Name"; echo "</th>";
                echo "<th>"; echo "Author's Name"; echo "</th>";
                echo "<th>"; echo "Edition"; echo "</th>";
                echo "<th>"; echo "department"; echo "</th>";
                echo "<th>"; echo "status"; echo "</th>";
                echo "<th>"; echo "issue_date"; echo "</th>";
                echo "<th>"; echo "return_date"; echo "</th>";
                echo "</tr>";

          while ($row=mysqli_fetch_assoc($res))
            {
          echo "<tr style='background-color: #0a5056;'>";
                  echo "<td>"; echo $row['sid']; echo "</td>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['sem']; echo "</td>";
                  echo "<td>"; echo $row['roll']; echo "</td>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $row['name']; echo "</td>";
                  echo "<td>"; echo $row['authors']; echo "</td>";
                  echo "<td>"; echo $row['edition']; echo "</td>";
                  echo "<td>"; echo $row['department']; echo "</td>";
                  echo "<td>"; echo $row['approve']; echo "</td>";
                  echo "<td>"; echo $row['issue_date']; echo "</td>";
                  echo "<td>"; echo $row['return_date']; echo "</td>";

              echo "</tr>";

          }

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login to view information");
          </script>
        <?php
      }
     ?>

</div>
</div>

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
    document.body.style.backgroundColor = "white";
}
</script>

</body>
</html>
