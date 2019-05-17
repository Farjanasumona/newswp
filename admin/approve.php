<?php
include "connection.php";
 ?>


<?php require_once('include/top.php'); ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Appove request</title>
 	<style type="text/css">
 		body
 		{
 			background-image: url("images/b.jpg");
 			background-repeat:no-repeat;
 			width: 1349.5px;
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
		h3
		{
			text-align: center;
		}
		.form-control
		{
			width: 400px;

		  background-color:#020202;
		  color:#fff;
		}
		.book
		{
			width: 400px;
			margin:0 auto;
		}
 	</style>
 </head>
 <body>
   <body>
     <?php require_once('include1/navbar.php'); ?>

     <?php require_once('include/jumbotron.php'); ?>


 <div class="wrapper">
 	<!--______________________submit1______________________-->

 	<form action="" method="post">
 		<input style="float: right;" class="btn btn-default" type="submit" name="submit1" value="Notify User">
 	</form>

 	<br><br>
 	<h3>Approve Request</h3>
 	<!--______________________submit______________________-->
 	<form class="book" action="" method="post">
    <input class="form-control" type="text" name="approve" placeholder="Approve or not" required=""> <br>
    <input  class="form-control" type="text" name="issue_date" placeholder="Issue Date yyyy-mm-dd" required=""> <br>
    <input  class="form-control" type="text" name="return_date" placeholder="Return Date yyyy-mm-dd" required=""><br>
    <input  class="form-control" type="text" name="tm" placeholder="Return Date        Dec 19, 2017 15:00:00" required=""><br>

    <input   class="btn btn-default" type="submit" name="submit" value="ADD">

  </form><br><br><br>

  <?php


  		if(isset($_POST['submit']))
  		{
        $ql="INSERT INTO timer VALUES ('$_SESSION[name]','$_SESSION[bid]','$_POST[tm]')";
        mysqli_query($db,$ql);

  			$sql="UPDATE issue SET approve='$_POST[approve]', issue_date='$_POST[issue_date]', return_date='$_POST[return_date]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]'";
  			mysqli_query($db,$sql);



  			$s="UPDATE `books` SET quantity = quantity-1 where bid='$_SESSION[bid]'";
  			mysqli_query($db,$s);

  			$res=mysqli_query($db,"SELECT quantity FROM `books` WHERE bid='$_SESSION[bid]';");
  			while($row=mysqli_fetch_assoc($res))
  			{
  				if( $row['quantity']==0)
		  		{
		  			mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
		  		}

  			}

  			?><script type="text/javascript">
  				alert("Updated successfully!");
  			</script> <?php
  		}

   //______________________submit1______________________

 	if(isset($_POST['submit1']))
 	{
 		$q="INSERT INTO `lms`.`messages` VALUES ('','$_SESSION[name]','Your request for book is approved.Please Collect it tomorrow','no','user');";
 		if(mysqli_query($db,$q))
 		{
 		?> <script type="text/javascript">
 				alert("Notification Sent");
 			</script>
 		<?php
 		}
 	}
 	?>
 </div>
 </body>
 </html>
