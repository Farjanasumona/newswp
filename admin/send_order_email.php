
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
		height: 400px;
		background-image: url("images/d.jpg");
		background-repeat: no-repeat;

	}
		.wrapper
		{

			padding: 10px;
			width:900px;
			height: 610px;
			margin:-20px auto;

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
	<h4>Send message </h4>
		<form style="" action="" method="post">
			<input style="height: 30px" class="form-control" type="text" name="username" placeholder="to..."><br>
			<input class="form-control" type="text" name="message" placeholder="Write something..."><br>
			<input class="btn btn-default" type="submit" name="submit" value="Send"><br><br>
		</form>
		<?php
		if(isset($_POST['submit']))
			{
				if(isset($_SESSION['login_user']))
			{
				$sql="INSERT INTO `lms`.`messages` VALUES ('','$_POST[username]','$_POST[message]','no','user');";
				if(mysqli_query($db,$sql))
				{

					$q="SELECT * FROM messages where who='admin' order by id DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_array($res))
     			 	{
					echo "<tr>";
          				echo "<td>"; echo $row['username']; echo ":</td>";

          				echo "<td>"; echo $row['message']; echo "</td>";
          			echo "</tr>";

					}

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

			$res=mysqli_query($db,"SELECT * FROM messages WHERE who='admin' order by id DESC;");
				echo "<table class='table table-bordered '>";
				while ($row=mysqli_fetch_assoc($res))
     			{
				echo "<tr>";
          			echo "<td>"; echo $row['username']; echo ":</td>";

          			echo "<td>"; echo $row['message']; echo "</td>";
          		echo "</tr>";
          			}

				echo "</table>";

				$sql="UPDATE messages set status='yes' WHERE who='admin'";
       			mysqli_query($db,$sql);


		}
		 ?>
</div>

</body>
</html>
