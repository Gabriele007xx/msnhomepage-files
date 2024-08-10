<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>Home - E-commerce</title>
<?php 
session_start();
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
<form method="post" action="productsell.php"><br>
Inserisci un prodotto:
<div class="input-group"><label>Nome</label>
<input name="name" value="" type="text"></div>
<div class="input-group">
<label>Prezzo</label>
<input name="price" type="text"></div>
<div class="input-group">
<div class="input-group">
<label>URL Immagine</label>
<input name="url" type="text"></div>
<div class="input-group">
<label>Scadenza (d-m-y):</label>
<input name="scadenza" type="text"></div>
<div class="input-group">
<button type="submit" class="btn" name="reg_user">Vendi prodotto</button>
</div>
</form>
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