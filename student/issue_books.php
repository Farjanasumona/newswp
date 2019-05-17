<?php
	include "connection.php";
	include "top-nav-2.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Issue info</title>
 	<style type="text/css">
 	body
 	{

 		width: 1366px;
 	}	.form-control

	{
		width:400px;
		height: 38px;
	}
	form
	{	width: 400px;
		margin: 0 auto ;

	}
 	</style>
 </head>
 <body style="background-color: #2d6548">
 	<h2 class="text-center" style="color: #fff">Request for a book</h2>

 	<!--_______________________-->
 	 <?php
	    if(isset($_SESSION['login_user']))

	    {
	     	$sql = "SELECT * FROM books WHERE bid='$_SESSION[bid]'";
			$result = mysqli_query($db,$sql) or die (mysql_error());
			while ($row = mysqli_fetch_assoc($result))
			{
    			$name=$row['name'];
    			$authors=$row['authors'];
			    $edition=$row['edition'];
			    $department=$row['department'];

   			}
   		}
	    ?>
	    <!--____________________________-->

 	<form action="" method="post" >

	  				<label><h4><b>Book's ID: </b></h4></label>
                    <input class="form-control text-center" type="text" name="bid"  value="<?php echo $_SESSION['bid']; ?>" size=20/><br>
             		<label><h4><b>Book's Name: </b></h4></label>
                    <input class="form-control text-center" type="text" name="name"  value="<?php echo $name; ?>" size=20/><br>

                    <label><h4><b>Author's Name: </b></h4></label>
                    <input class="form-control text-center" type="text" name="authors"  value="<?php echo $authors; ?>" size=20/><br>
                    <label><h4><b>Edition: </b></h4></label>
                    <input class="form-control text-center" type="text" name="edition"  value="<?php echo $edition; ?>" size=20/><br>
                    <label><h4><b>Department: </b></h4></label>
                    <input class="form-control text-center" type="text" name="department"  value="<?php echo $department; ?>" size=20/><br><br>

                     <input class="btn btn-default submit " style="width: 60px" type="submit" name="submit" value="SEND">
	  		</form><br><br>

	  		<!--_______________Requesting_______________-->
	  		<?php
	  			if(isset($_POST['submit']))
	  			{
	  				$q="INSERT INTO issue VALUES('$_SESSION[login_user]','$_SESSION[bid]','','','')";
	  				mysqli_query($db,$q);

	  				?>
	  				<script type="text/javascript">
	  					alert("Request sent succesfully. We will send you approval message");
	  				</script>
	  				<?php
	  			}

	  		 ?>

 </body>
 </html>
