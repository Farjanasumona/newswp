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



  <?php require_once('include/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>


	<!-- _____________search bar______________ -->
  <section>



    <div class="srch">
        <form class="navbar-form " method="post" name="form1">
            <div class="form-group">
                <input class="form-control" type="text" name="search" placeholder="Search By Name">
                <button style="background-color: #95bbab" type="submit" name="submit" class="btn btn-default">
                	<span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
    </div>
    <!---->





	<div id="main">
		<div class="container">
		<div class="info">
		 <?php
			if(isset($_POST['submit']))
		 	{
		 	$q=mysqli_query($db,"SELECT * FROM documents where name like '%$_POST[search]%' ");
	         ?><h2>Searched information</h2> <?php
	        if(mysqli_num_rows($q)==0)
	          {
	          	{echo " Sorry student found.Try searching again.";}
	          }
	          else
	          {
	    echo "<table class='table table-bordered table-striped '>";
				echo "<tr style='background-color: #95bbab;'>";
				echo "<th>"; echo "Id"; echo "</th>";
				echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";
        echo "<th>"; echo "Download"; echo "</th>";

				echo "</tr>";

				while ($row=mysqli_fetch_assoc($q))
				{
					echo "<tr>";

						echo "<td>"; echo $row['id']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['dept']; echo "</td>";
            echo "<td>"; ?> <a href="download.php?dow= <?php echo $row['path'];?>">Download</a>  <?php echo "</td>";

					echo "</tr>";

				}

		echo "</table>";
	          }
		}

	else
	{	?><h2>Important Notes</h2><?php

		$res=mysqli_query($db,"SELECT * FROM documents");

		echo "<table class='table table-bordered table-striped '>";
			echo "<tr style='background-color: #95bbab;'>";
				echo "<th>"; echo "Id"; echo "</th>";
				echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";


        	echo "<th>"; echo "Download"; echo "</th>";


			echo "</tr>";

		while ($row=mysqli_fetch_assoc($res))
		{
			echo "<tr>";

				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
        	echo "<td>"; echo $row['dept']; echo "</td>";

        echo "<td>"; ?> <a href="download.php?dow= <?php echo $row["path"];?>">Download</a>  <?php echo "</td>";

			echo "</tr>";

		}

		echo "</table>";
	}
		  ?>

	</div>


		</div>
	</div>


</section>

</div>



</body>
</html>
