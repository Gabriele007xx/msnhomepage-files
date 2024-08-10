<?php
session_start();
include_once('mysql-fix.php');
$username = $_POST['username'];
$password = $_POST['password'];
$ok = 0;
if($_POST['username'] == "" || $_POST['password']  == "")
{
	echo "Almeno uno dei campi inseriti è vuoto.";
	$ok = 1;
} 
if($ok == 0)
{
	$conn=mysql_connect("localhost","root","");
	if (!$conn){
		echo ("Errore durante la connessone a MySQL");
		exit();
			   }
 mysql_select_db("e-commerce");
 // Cripta la password per confrontarla con quella del database
$password = md5($password);
// seleziona la riga dove nome utente e password combaciano
  	$query = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
	  // esegue la query
  	$results = mysql_query($query);
	  // se c'è un risultato corrispondente allora logga l'utente'
  	if (mysql_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['role'] = "Utente";
echo("Login avvenuto. Vai nella <a href=index.php>homepage</a>");
}
else {
	echo ("Combinazione sbagliata");
}
}

?>