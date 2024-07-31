<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="generator" content="AlterVista - Editor HTML"/>
  <title></title>
</head>
<body>
<?php require_once("../../sections/menu.php"); ?>
Save war state by tag:
  <form method=POST action="fetchwar.php" align="center">
		<input type=text name=tag id=tag>
        <input type=submit>
  </form>
Retrieve war states by tag:  
 <form method=GET action="view.php" align="center">
		<input type=text name=tag id=tag>
        <input type=submit>
  </form>
<?php require_once("../../sections/footer_web.php"); ?>
</body>
</html>
