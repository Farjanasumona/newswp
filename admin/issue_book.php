<?php
include "connection.php";
 ?>


<?php require_once('include/top.php'); ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Issue book</title>
 	<style type="text/css">
 		body
 		{
 			background-image: url("images/a.jpg");
 			background-repeat:no-repeat;
 			width: 1365px;
 			height: 650px;
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
		.srch
{

  padding-left: 980px;
}
 	</style>
 </head>
 <body>
   <?php require_once('include1/navbar.php'); ?>

   <?php require_once('include/jumbotron.php'); ?>

 <div class="wrapper">
 	<div class="srch">
              <form class="navbar-form " method="post" name="form2">
                  <div class="form-group">
                  <input class="form-control" type="text" name="username" placeholder="Insert Student's username">
                  <input class="form-control" type="text" name="bid" placeholder="Insert bid">
                  <input style="background-color: #95bbab" type="submit" name="submit3" class="btn btn-default" value="Submit">
                  </div>
              </form>
            </div>
 	<h3>Requests of books</h3>
 	<?php
 			if(isset($_SESSION['login_user']))
 			{
 			    $sql = "SELECT sid,student.username,sem,roll,books.bid,name,authors,edition from student inner join issue on student.username=issue.username inner join books on issue.bid=books.bid WHERE issue.approve =''";
				$res=mysqli_query($db,$sql);

				echo "<table class='table table-bordered'>";
					echo "<tr style='background-color: #0a502f;'>";
			          echo "<th>"; echo "sid"; echo "</th>";
			          echo "<th>"; echo "username"; echo "</th>";
			          echo "<th>"; echo "sem"; echo "</th>";
			          echo "<th>"; echo "roll"; echo "</th>";
			          echo "<th>"; echo "bid"; echo "</th>";
			          echo "<th>"; echo "Book Name"; echo "</th>";
			          echo "<th>"; echo "Author's Name"; echo "</th>";
			           echo "<th>"; echo "Edition"; echo "</th>";
          			echo "</tr>";

					while ($row=mysqli_fetch_assoc($res))
     			 	{
					echo "<tr style='background-color: #0a5056;'>";
          				echo "<td>"; echo $row['sid']; echo ":</td>";
          				echo "<td>"; echo $row['username']; echo "</td>";
          				echo "<td>"; echo $row['sem']; echo "</td>";
          				echo "<td>"; echo $row['roll']; echo "</td>";
          				echo "<td>"; echo $row['bid']; echo "</td>";
          				echo "<td>"; echo $row['name']; echo "</td>";
          				echo "<td>"; echo $row['authors']; echo "</td>";
          				echo "<td>"; echo $row['edition']; echo "</td>";
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
 			if(isset($_POST['submit3']))
 			{
 				$_SESSION['name']=$_POST['username'];
 				$_SESSION['bid']=$_POST['bid'];

		        ?>
		            <script type="text/javascript">window.location="approve.php"</script>
		        <?php
 			}


 		 ?>
 </div>
 </body>
 </html>
