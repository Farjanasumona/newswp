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
  background-color: #eaf9e0;
}
</style>
</head>
<body>
  <div class="fullbody">



  <?php require_once('include1/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>


	<!-- _____________search bar______________ -->
  <section>



    <div class="srch">
        <form class="navbar-form " method="post" name="form1">
            <div class="form-group">
                <input class="form-control" type="text" name="search" placeholder="Search By roll...">
                <button style="background-color: #95bbab" type="submit" name="submit" class="btn btn-default">
                	<span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
    </div>
    <!---->
    <span style="padding-left:25px;font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	  	<!--______________sidebar image___________-->
 <div class="clearfix">
    <div class="profile clearfix" style="padding-left: 35px;">
      <div class="profile_pic">

        <?php

        if(isset($_SESSION['login_user']))
          {
            echo "<div class='pic'><img class='img-circle profile_img' height=100 width=110 src='images/".$_SESSION['pic']."'></div> ";
          }
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
<!--________________________-->
	  <div class="h" style="padding-left: 20px;"> <a href="profile.php">My Profile</a></div>
	   <div class="h" style="padding-left: 20px;"><a href="issue_book.php">Book request</a></div>
     <div class="h" style="padding-left: 20px;"><a href="issue_info.php">Book Issue Info</a></div>

	</div>

	<div id="main">
		<div class="container">
		<div class="info">
		 <?php
			if(isset($_POST['submit']))
		 	{
		 	$q=mysqli_query($db,"SELECT * FROM student where roll like '%$_POST[search]%' ");
	         ?><h2>Searched information</h2> <?php
	        if(mysqli_num_rows($q)==0)
	          {
	          	{echo " Sorry student found.Try searching again.";}
	          }
	          else
	          {
	    echo "<table class='table table-bordered table-striped '>";
				echo "<tr style='background-color: #95bbab;'>";
				echo "<th>"; echo "firstname"; echo "</th>";
				echo "<th>"; echo "lastname"; echo "</th>";
				echo "<th>"; echo "username"; echo "</th>";
				echo "<th>"; echo "email"; echo "</th>";
				echo "<th>"; echo "contact"; echo "</th>";
				echo "<th>"; echo "semester"; echo "</th>";
        echo "<th>"; echo "roll"; echo "</th>";
        echo "<th>"; echo "status"; echo "</th>";
        echo "<th>"; echo "Approve"; echo "</th>";
        echo "<th>"; echo "Not Approve"; echo "</th>";

				echo "</tr>";

				while ($row=mysqli_fetch_assoc($q))
				{
					echo "<tr>";

						echo "<td>"; echo $row['firstname']; echo "</td>";
						echo "<td>"; echo $row['lastname']; echo "</td>";
						echo "<td>"; echo $row['username']; echo "</td>";
						echo "<td>"; echo $row['email']; echo "</td>";
						echo "<td>"; echo $row['contact']; echo "</td>";
						echo "<td>"; echo $row['sem']; echo "</td>";
						echo "<td>"; echo $row['roll']; echo "</td>";
						echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; ?> <a href="approve1.php?id= <?php echo $row["sid"];?>">Approve</a>  <?php echo "</td>";
            echo "<td>"; ?> <a href="notapprove1.php?id=<?php echo $row["sid"];?>">Not Approve</a>  <?php echo "</td>";

					echo "</tr>";

				}

		echo "</table>";
	          }
		}

	else
	{	?><h2> Student Information</h2><?php

		$res=mysqli_query($db,"SELECT * FROM student;");

		echo "<table class='table table-bordered table-striped '>";
			echo "<tr style='background-color: #95bbab;'>";
				echo "<th>"; echo "firstname"; echo "</th>";
				echo "<th>"; echo "lastname"; echo "</th>";
				echo "<th>"; echo "username"; echo "</th>";
				echo "<th>"; echo "email"; echo "</th>";
				echo "<th>"; echo "contact"; echo "</th>";
				echo "<th>"; echo "semester"; echo "</th>";
        echo "<th>"; echo "roll"; echo "</th>";
        echo "<th>"; echo "active status"; echo "</th>";
        	echo "<th>"; echo "status"; echo "</th>";
        	echo "<th>"; echo "Approve"; echo "</th>";
          	echo "<th>"; echo "Not Approve"; echo "</th>";

			echo "</tr>";

		while ($row=mysqli_fetch_assoc($res))
		{
			echo "<tr>";

				echo "<td>"; echo $row['firstname']; echo "</td>";
				echo "<td>"; echo $row['lastname']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";
				echo "<td>"; echo $row['sem']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['active_status']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; ?> <a href="approve1.php?id= <?php echo $row["sid"];?>">Approve</a>  <?php echo "</td>";
        echo "<td>"; ?> <a href="notapprove1.php?id=<?php echo $row["sid"];?>">Not Approve</a>  <?php echo "</td>";


			echo "</tr>";

		}

		echo "</table>";
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
</section>

</div>



</body>
</html>
