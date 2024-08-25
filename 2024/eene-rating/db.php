<?php
$url="localhost";
$password="";
$db_name="my_msnhomepage";
$username="msnhomepage";

$con = new mysqli($url,$username,$password,$db_name);

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
?>
