<?php
session_start();
include_once('mysql-fix.php');
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['url'];
$scadenza = $_POST['scadenza'];
$username = $_SESSION['username'];
$ok = 0;
if($_POST['name'] == "" || $_POST['price']  == "" || $_POST['scadenza'] == "")
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
 $query="SELECT MAX(id) As MaxID FROM prodotto";
 $ris = mysql_query($query);
 $riga = mysql_fetch_array($ris);
 $maxid = $riga['MaxID'] + 1;
$insert="INSERT INTO prodotto (id,Venditore,Nome_prodotto,Prezzo,Scadenza,Immagine) VALUES ('$maxid','$username','$name','$price','$scadenza','$image')";
if (!mysql_query($insert))
{
	echo("Errore nel comando INSERT");
exit();
}
echo("Inserimento del prodotto riuscito. Vai nella <a href=index.php>homepage</a>");
}
?>