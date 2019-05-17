<?php
 $link=mysqli_connect("localhost","root","");
 mysqli_select_db($link,"lms");
 $id=$_GET["id"];
 mysqli_query($link,"update student set status='no' where sid=$id");

      $res=mysqli_query($link,"select * from student where sid= $id");
      while ($row=mysqli_fetch_array($res)) {


     $_SESSION['email']=$row['email'];
 }

 $to =$_SESSION['email'] ;
 $subject = "Message from RUET  library Management system";
 $txt = "You are not approved due to some difficulties.Please try again later.";
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
