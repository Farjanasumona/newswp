<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>feeedback page</title>
	<style type="text/css">
		body
		{background-image: url(images/66.jpg);
			background-repeat: no-repeat;}
		.wrapper
		{
			padding: 10px;
			width:900px;
			max-height: 600px;
			margin:-30px auto;
			background-color: #000000;
			opacity:.8;
    		filter:alpha(opacity=60);
    		color :#fff;
		}
		.form-control
		{
			width: 60%;
			height: 70px;
		}
		.scroll
		{

	    width: 100%;
	    height:405px;
	    overflow: auto;
		}
	</style>
</head>
<body>
	<?php require_once('include1/navbar.php'); ?>

	<?php require_once('include/jumbotron.php'); ?>
	<div class="wrapper">
	<h4>If you have any suggesions or question comment below.</h4>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>
			<input class="btn btn-default" type="submit" name="submit" value="Comment"><br><br>
		</form>
		<div class="scroll">
		<?php
		if(isset($_POST['submit']))
			{
				if(isset($_SESSION['login_user']))
			{
				$sql="INSERT INTO `lms`.`comments` VALUES ('','$_SESSION[login_user]', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM comments order by id DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res))
     			 	{
					{echo "<tr>";
          				echo "<td>"; echo $row['username']; echo ":</td>";

          				echo "<td>"; echo $row['comment']; echo "</td>";
          			echo "</tr>";
          			}
					}

				}
				?>
				<script type="text/javascript">
					alert("Thanks for sending us feedback.We'll use it to improve this website in the (not too distant future.");
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("You need to login first to comment.");
				</script>
				<?php
			}
		}
		else
		{
			$q="SELECT * FROM comments order by id DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered table-responsive'>";
					while ($row=mysqli_fetch_assoc($res))
     			 	{
					echo "<tr>";
          				echo "<td>"; echo $row['username']; echo ":</td>";

          				echo "<td>"; echo $row['comment']; echo "</td>";
          			echo "</tr>";

					}
		}
		 ?>

	</div>
	</div>

</body>
</html>
