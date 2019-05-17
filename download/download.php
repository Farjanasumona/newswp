<!--<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"lms");
$id=$_GET["id"];
mysqli_query($link,"update student set status='yes' where sid=$id");

?>

 <script type="text/javascript">
 window.location="display_student_info.php";

</script>-->

 <?php
 include "connection.php";

 if(isset($_GET['dow'])){
   $path=$_GET['dow'];

   $res=mysqli_query($db,"SELECT * FROM documents WHERE path='$path'");
   header('Content-type: application/octet-stream');
   header('Content-Disposition: attachment;filename="'.basename($path).'"');
   header('Content-Length: '.filesize($path));
   readfile($path);

 }
  ?>
