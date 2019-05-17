<?php 
include "connection.php";
include "top-nav-2.php"; 
 ?>

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
button 
{
  width: 250px;
  height: 50px;
  background-color:  #0a4c30;
}
.h 
{
  box-shadow: #715a58 0 1px 0, inset rgba(255,255,255,.16) 0 1px 0;
  width: 250px;
  height: 50px;
  background-color:  #0a4c30;
}
.h span{
margin-top:15px;
float:right;
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
form button
{height: 33px;
width: 38px;}
.srch
{

  padding-left: 1000px;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <!--_____________________sidebar profile____________-->
  <div class="clearfix">
    <div class="profile clearfix" style="padding-left: 35px;">
      <div class="profile_pic">
        
        <?php 

        if(isset($_SESSION['login_user']))
          {echo "<div class='pic'><img class='img-circle profile_img' height=100 width=140 src='images/".$_SESSION['pic']."'></div> ";}
        else
        {
            echo "<div class='pic'><img class='img-circle profile_img' height=100 width=140 src=images/44.png> </div><br>";
        }

         ?>
        }
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
<!--_________-->

  <div class="h" style="padding-left: 48px;"><a href="index.php">Home </a></div>
  <div class="dropdown">
    <button class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">Department
    <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <div class="h"><li ><a href="ece.php">ECE</a></li>
        <div class="h"><li><a href="">CSE</a></li>
        <div class="h"><li><a href="eee.php">EEE</a></li>
      </ul>
  </div>

</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div id="main">
     <!-- _____________search bar______________ -->

            <div class="srch">
              <form class="navbar-form " method="post" name="form1">
                  <div class="form-group">
                  <input class="form-control" type="text" name="search" placeholder="Search books...">
                  <button style="background-color: #95bbab" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                  </button></div>
              </form>
            </div>  
          
          <!---->
  <?php 
       if(isset($_POST['submit']))
    {

        $q=mysqli_query($db,"SELECT * FROM books where department='CSE' and name like '%$_POST[search]%' ");
         ?><h2>Searched Books</h2> <?php
          if(mysqli_num_rows($q)==0)
            {echo " Sorry no book found.Try searching again.";}
          else{
        echo "<table class='table table-bordered  table-hover' >";
          echo "<tr style='background-color: #95bbab;'>";
          echo "<th>"; echo "ID"; echo "</th>";
          echo "<th>"; echo "Book-Name"; echo "</th>";
          echo "<th>"; echo "Authors-Name"; echo "</th>";
          echo "<th>"; echo "Edition"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          
        echo "</tr>";

        while ($row=mysqli_fetch_assoc($q))
        {
          echo "<tr>";

          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";
          echo "<td>"; echo $row['department']; echo "</td>";
          
        echo "</tr>";
        }
         echo "</table>";
       }
    }
    else
      {
      ?><h2>List of Books</h2><?php
      $res=mysqli_query($db,"SELECT * FROM books WHERE status='available' and department='CSE';");
      $count=mysqli_num_rows($res);
      if($count>0){

      echo "<table class='table table-bordered  table-hover' >";
        echo "<tr style='background-color: #95bbab;'>";
          echo "<th>"; echo "ID"; echo "</th>";
          echo "<th>"; echo "Book-Name"; echo "</th>";
          echo "<th>"; echo "Authors-Name"; echo "</th>";
          echo "<th>"; echo "Edition"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          
        echo "</tr>";

      while ($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";

          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";
          echo "<td>"; echo $row['department']; echo "</td>";
          
        echo "</tr>";

      }

      echo "</table>";
    }
    else
      {echo "<h3>Sorry there is no book of this department in the library</h3>";}
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
    document.body.style.backgroundColor = "white";
}
</script>
     
</body>
</html> 
