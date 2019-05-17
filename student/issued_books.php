<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>issued books</title>
 	<style type="text/css">
 		body
 		{
 			background-image: url("images/a.jpg");
 			background-repeat:no-repeat;
 			width: 1362px;
 			height: 650px;
 		}
 		.wrapper
		{
			padding: 20px;
			width:1050px;
			height: 610px;
			margin:-20px auto;
			background-color: #000000;
			opacity:.8;
    		filter:alpha(opacity=60);
    		color :#fff;
		}
 	</style>
 </head>
 <body>
	 <?php require_once('include1/navbar.php'); ?>

   <?php require_once('include/jumbotron.php'); ?>
 	<div class="wrapper">
 		<h3>Books you have taken</h3>
 		<?php
 			if(isset($_SESSION['login_user']))
 			{
 				$sql = "SELECT name,authors,edition,department,approve,issue_date,return_date from issue inner join books on books.bid=issue.bid where username='$_SESSION[login_user]'";
				$res=mysqli_query($db,$sql);

				echo "<table class='table table-bordered'>";
					echo "<tr style='background-color: #0a502f;'>";
			          echo "<th>"; echo "name"; echo "</th>";
			          echo "<th>"; echo "authors"; echo "</th>";
			          echo "<th>"; echo "edition"; echo "</th>";
			          echo "<th>"; echo "department"; echo "</th>";
			          echo "<th>"; echo "approve"; echo "</th>";
			          echo "<th>"; echo "issue_date"; echo "</th>";
			          echo "<th>"; echo "return_date"; echo "</th>";
          			echo "</tr>";

					while ($row=mysqli_fetch_assoc($res))
     			 	{
					echo "<tr style='background-color: #0a5056;'>";
          				echo "<td>"; echo $row['name']; echo ":</td>";
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

 </body>
 </html>
