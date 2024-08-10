<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>Home - E-commerce</title>
<?php 
session_start();
include_once('mysql-fix.php');
?>
</head>
<body>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="width: 30%;"><a href="index.php"><img style="border: 0px solid ; width: 107px; height: 43px;" alt="" src="files/logo.png"></a></td>
<td style="text-align: right; width: 70%;">
<?php if (!isset($_SESSION['username'])) {
echo "<a href=" . "/loginseller.php" . ">Login (Venditore)</a> <a href=" . "/loginutente.php" . ">Login (Utente)</a> <a href=" . "/register.php" . ">Registrazione</a>";
}
else
{
$username = $_SESSION['username'];
$role = $_SESSION['role'];
echo "Loggato come $username." . "(" . $role . ")" . " <a href=" . "/profile.php" . " target=" . "_top" . ">Profilo</a>" ; } ?></td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td>
<table align="left" border="0">
<tbody>
<tr>
<td><a href="index.php">Home</a><br>
<?php if (isset($_SESSION['username'])) {
if($_SESSION['role']=="Venditore")
{
echo "<a href=sellproduct.php>Metti in vendita un prodotto</a>"; echo "<br>";
echo "<a href=product.php>I tuoi prodotti</a>"; }
else if ($_SESSION['role']=="Utente")
{
echo "<a href=product.php>I tuoi acquisti</a>";
}
}
?>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0">
<tbody>
<tr>
<td>
<?php
if(isset($_SESSION['role']))
{
	if($_SESSION['role']=="Venditore")
	{
	$nome = $_SESSION['username'];
	$conn=mysql_connect("localhost","root","");
	if (!$conn){
		echo ("Errore durante la connessone a MySQL");
		exit();
			   }
	mysql_select_db("e-commerce");
	$risultato = mysql_query("SELECT * FROM prodotto WHERE Venditore = '$nome'");
	$riga=mysql_fetch_array($risultato);
	echo "<table border=1>";
	echo "<tr><td>id</td><td>Venditore</td><td>Nome_prodotto</td><td>Prezzo</td><td>Scadenza</td><td>Immagine</td></tr>";
	while($riga)
	{
		echo "<tr><td>" . $riga["id"] . "</td><td>" . $riga["Venditore"] . "</td><td>" . $riga["Nome_prodotto"] . "</td><td>" . $riga["Prezzo"] . "</td><td>" . $riga["Scadenza"] . "</td><td>" . $riga["Immagine"] . "</td></tr>";
		$riga=mysql_fetch_array($risultato);
	}
	echo "</table>";
	}
	else if($_SESSION['role']=="Utente")
	{
		$conn=mysql_connect("localhost","root","");
	if (!$conn){
		echo ("Errore durante la connessone a MySQL");
		exit();
			   }
	mysql_select_db("e-commerce");
	$nome = $_SESSION['username'];
	$risultato = mysql_query("SELECT * FROM compra INNER JOIN prodotto ON compra.idprodotto = prodotto.id AND username = '$nome'");
	$riga=mysql_fetch_array($risultato);
	echo "<table border=1>";
	echo "<tr><td>idProdotto</td><td>Venditore</td><td>Nome_prodotto</td><td>Prezzo</td><td>Scadenza</td><td>Immagine</td></tr>";
	while($riga)
	{
		echo "<tr><td>" . $riga["id"] . "</td><td>" . $riga["Venditore"] . "</td><td>" . $riga["Nome_prodotto"] . "</td><td>" . $riga["Prezzo"] . "</td><td>" . $riga["Scadenza"] . "</td><td>" . $riga["Immagine"] . "</td></tr>";
		$riga=mysql_fetch_array($risultato);
	}
	echo "</table>";
	}
	}
else
{
echo "Devi essere un venditore per vedere i tuoi prodotti.";
}
?>
<br>
</td>
</tr>
<tr>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<br>
</body></html>