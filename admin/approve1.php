<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"lms");
$id=$_GET["id"];
mysqli_query($link,"update student set status='yes' where sid=$id");

     $res=mysqli_query($link,"select * from student where sid= $id");
     while ($row=mysqli_fetch_array($res)) {


    $_SESSION['email']=$row['email'];
}

$to =$_SESSION['email'] ;
$subject = "Approval message from library Management system";
$txt = "You are approved...Welcome to our library Management system. Click here http://localhost/newproject/student/student_login.php";
if(mail($to,$subject,$txt, 'From: farjana.sumona94@gmail.com')){
  ?>
  <script type="text/javascript">
  alert("send approval mail ");
  </script>
  <?php
}
else {
  ?>
  <script type="text/javascript">
  alert("not send approval mail ");
  </script>
  <?php
}

?>

 <script type="text/javascript">
 window.location="display_student_info.php";

 </script>
