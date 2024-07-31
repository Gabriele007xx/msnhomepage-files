<?php
$db = "my_msnhomepage";
$my_username = "msnhomepage";
$mysqli = new mysqli("localhost",$my_username,"",$db);
$tag = substr($_GET["tag"], 1, strlen($_GET["tag"])-1);
$query = "SELECT * FROM " . $tag . " ";
$wars = $mysqli -> query($query);
require_once("../../sections/menu.php");
if($wars->num_rows > 0)
{
	 while($row = $wars->fetch_assoc()) {
   		$query1 = "SELECT * FROM " . $row["tabella"];
        $war = $mysqli-> query($query1);
        while($riga = $war->fetch_assoc())
        {
        	echo "<table width=100% border=2>
            <tr>
            <td width=50%><img src=". $riga["imageclan"] . "></td>
            <td width=50%><img src=" . $riga["imageopponent"] . "></td>
            </tr> 
            </table>
            <table width=100%>
            <tr>
            <td>Stars: ". $riga["stars"] ." Enemy Stars: " . $riga["enemy_s"] . " Size: " . $riga["size"] . " Destruction%: " . $riga["dp"] . " Enemy%: " . $riga["dp_e"] . " Attacks: " . $riga["attacks"] . " Enemy Attacks: " . $riga["enemy_a"] . " " . $riga["starttime"] . "-" . $riga["endtime"] ."<rd>
            <tr>
            </table>
            <table width=100% border=1>
            <tr>
            <td width=50%>" . $riga["clan_team"] ."</td>
            <td width=50%>" . $riga["enemy_t"] . "</td>
            <tr>
            </table>";
        }
  }
}
require_once("../../sections/footer_web.php");
?>
