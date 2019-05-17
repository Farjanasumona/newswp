<?php

include "connection.php";
 ?>

<?php require_once('include/top.php'); ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>

 	<title>My profile</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="style2.css">

 	<style>
 	.img-circle .profile_img
 	{
    width: 15%;
    background: #fff;

    z-index: 1000;
    position: inherit;
    margin-top: 20px;
    border: 1px solid #141415;
    padding: 4px;
	}
	.form-control
	{
		width:220px;
		height: 38px;
	}
	form
	{
		padding-left: 400px;
	}
	.pic
	{
		width:720px;
		margin: 0px 425px;
	}
 	</style>
 </head>
	 <body style="background-color: #2d6548">
     <?php require_once('include1/navbar.php'); ?>

     <?php require_once('include/jumbotron.php'); ?>
     <?php
   			if(isset($_POST['submit']))
   			{
   				move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

   				$firstname = $_POST['firstname'];
   				$lastname = $_POST['lastname'];
   				$username = $_POST['username'];
                   $password = $_POST['password'];
                   $contact = $_POST['contact'];
                   $pic=$_FILES['file']['name'];


                   $sql = "UPDATE admin SET image='$pic',firstname='$firstname',lastname='$lastname',username='$username',password='$password',contact='$contact' WHERE username='".$_SESSION['login_user']."';";

                   if (mysqli_query($db, $sql)) {

                           ?>
                               <script type="text/javascript">
                               	alert("Saved successfully");
                               </script>
                             <script type="text/javascript">window.location="profile.php"</script>
                           <?php

                       }

   			}
   		 ?>

	  	<div class="wrapper">
	   <h2 class="text-center" style="color: #fff">Basic Information</h2>


	    <?php
	    if(isset($_SESSION['login_user']))

	     	{
	     	$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
			$result = mysqli_query($db,$sql) or die (mysql_error());
			while ($row = mysqli_fetch_assoc($result))
			{
    			$firstname=$row['firstname'];
    			$lastname=$row['lastname'];
			    $Username=$row['username'];
			    $Password=$row['password'];
			    $contact=$row['contact'];

			   $_SESSION['pic']=$row['image'];

				$pic=$row['image'];


   			}
   			if(isset($_SESSION['login_user']))
          			{
          				echo "<div class='pic'><img class='img-circle profile_img' height=110 width=120 src='images/".$_SESSION['pic']."'></div> ";
          			}



	    ?>
	    <br><br>
	    <div class="profile_info text-center">
	      <span style="color: white">Welcome,</span>

	      <h4 style="color: white"><?php echo $_SESSION['login_user'];?></h4>

	     </div><br><br>
	  		<form action="" method="post" enctype="multipart/form-data">
	  				<input class="form-control text-center" type="file" name="file" >
	  				<label><h4><b>First Name: </b></h4></label>
                    <input class="form-control text-center" type="text" name="firstname"  value="<?php echo $firstname; ?>" size=20/><br>
             		<label><h4><b>Last Name: </b></h4></label>
                    <input class="form-control text-center" type="text" name="lastname"  value="<?php echo $lastname; ?>" size=20/><br>

                    <label><h4><b>Username: </b></h4></label>
                    <input class="form-control text-center" type="text" name="username"  value="<?php echo $Username; ?>" size=20/><br>
                    <label><h4><b>Password: </b></h4></label>
                    <input class="form-control text-center" type="text" name="password"  value="<?php echo $Password; ?>" size=20/><br>
                    <label><h4><b>Contact: </b></h4></label>
                    <input class="form-control text-center" type="text" name="contact"  value="<?php echo $contact; ?>" size=20/><br><br>

                     <input class="btn btn-default submit " style="width: 60px" type="submit" name="submit" value="SAVE">
	  		</form>
	  		<?php
		}
else
{
	?>
		<h3 class="text-center" style="color:#fff">Please Login to see information.</h3>
	<?php
}
		?>
		<br><br>

		</div>

	 </body>
 </html>
