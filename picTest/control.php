<?php
require 'mysql.php';
 session_start();
  $name= $_SESSION['name'];
 
 $age= $_SESSION['age'];
  $sex=$_SESSION['sex'];
 $fj=$_SESSION['fj'];
  
$ok=$_POST['ok'];
$ms=$_POST['ms'];
$pic2=$_POST['pic2'];
$pic4=$_POST['pic4'];
$test=new info();
$test->insert($name,$pic2,$pic4,$ok,$ms,$fj,$sex,$age);







?>