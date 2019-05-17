<?php 
include "top-nav.php";
include "connection.php";
 ?>

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
			margin:-20px auto;
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

 <div class="wrapper">
 	<form action="" method="post">
 		<input style="float: right;" class="btn btn-default" type="submit" name="submit1" value="Notify User">
 	</form>
 	
 	<br><br>
 	<h3>Approve Request</h3>
 	<form class="book" action="" method="post">
    <input class="form-control" type="text" name="approve" placeholder="Approve or not" required=""> <br> 
    <div style="height: 50px;padding-top:10px;padding-right: 0px">
    	<input style="width: 130px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="iy" placeholder="Issue yyyy" required=""> &nbsp&nbsp
    	<input style="width: 120px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="im" placeholder="Issue mm" required=""> &nbsp&nbsp
    	<input style="width: 115px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="idt" placeholder="Issue dd" required=""> 

	</div>
    <div style="height: 50px;padding-top:  10px;padding-right: 0px">
    	<input style="width: 130px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="ry" placeholder="Return yyyy" required=""> &nbsp&nbsp
    	<input style="width: 120px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="rm" placeholder="Return mm" required=""> &nbsp&nbsp
    	<input style="width: 115px;background-color: #000000;opacity:.8;filter:alpha(opacity=60);" class="" type="text" name="rd" placeholder="Return dd" required=""> 

	</div>

    
    <input   class="btn btn-default" type="submit" name="submit" value="ADD">

  </form>
  <?php 

  
  		if(isset($_POST['submit']))
  		{
  			$sql="UPDATE issue SET approve='$_POST[approve]', issue_date='$_POST[iy]-$_POST[im]-$_POST[idt]', return_date='$_POST[ry]$_POST[rm]$_POST[rd]' WHERE username='$_SESSION[name]'";
  			mysqli_query($db,$sql);
  			?><script type="text/javascript">
  				alert("Updated successfully!");
  			</script> <?php
  		}
   

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