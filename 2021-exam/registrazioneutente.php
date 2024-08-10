<?php
session_start();
include_once('mysql-fix.php');
$username = $_POST['username'];
$password = $_POST['password_1'];
$password2 = $_POST['password_2'];
$ok = 0;
if($_POST['username'] == "" || $_POST['password_1']  == "" || $_POST['password_2'] == "")
{
	echo "Almeno uno dei campi inseriti è vuoto.";
	$ok = 1;
}
if($_POST['password_1'] != $_POST['password_2'])
{
	echo "Le password non coincidono.";
	$ok = 1;
}
  
if($ok == 0)
{
	$time = date("j/n/Y");
	$timo = date("j/n/Y H:i:s");
	$conn=mysql_connect("localhost","root","");
	if (!$conn){
		echo ("Errore durante la connessone a MySQL");
		exit();
			   }
 mysql_select_db("e-commerce");
$insert="INSERT INTO utente (username,password,datar,ul,NumeroAcquisti) VALUES ('$username','" . md5($password) . "','$time','$timo','0')";
if (!mysql_query($insert))
{
	echo("Errore nel comando INSERT");
exit();
}
$_SESSION['username'] = $username;
$_SESSION['role']= "Utente";
echo("Registrazione avvenuta. Vai nella <a href=index.php>homepage</a>");
}
?>