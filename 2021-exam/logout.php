<?php
session_start();
if(isset($_SESSION['username']))
{
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['role']);
}
else
{
	echo "Non sei loggato.";
}
?>