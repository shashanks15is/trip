<?php
$usn=$_POST['usn'];
$name=$_POST['name'];
$bg=$_POST['bg'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$alternate=$_POST['alternate'];
$parent=$_POST['parent'];
$parent_no=$_POST['parent_no'];
$address=$_POST['address'];



  mysql_connect("localhost","root") or die(mysql_error());
  mysql_select_db("trip") or die(mysql_error());

  $query=mysql_query("insert into students values('$usn','$name','$bg','$gender','$age','$dob','$email','$phone','$alternate','$parent','$parent_no','$address')") or die(mysql_error());

if($query){  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Successfully Registered !')
       window.open('http://api.clobous.com/a97197/sendmsg/${phone}/Dear friend, You have successfully registered to class trip.','_top');
       </SCRIPT>");
}
 else {
  	echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Unsuccessful !Try again..')
       window.location.href='index.php';
       </SCRIPT>");
  } 
?>
 
