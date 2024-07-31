<?php
$clantag = $_POST["tag"];
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjEzMTA3ZWE4LTM4ZDctNGNjYS05MzllLWRlZjMzMmNhNDY4ZSIsImlhdCI6MTY2MDk0NTUyMiwic3ViIjoiZGV2ZWxvcGVyLzMwNDY3ZjU3LTdkNzAtMGM0Ny0zZDg1LWFlYTJkNWJiNTI2MiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjUuOS42Ny43MSIsIjE3Mi42Ny4xNjkuMTg2IiwiMTA0LjIxLjI3LjIwMCJdLCJ0eXBlIjoiY2xpZW50In1dfQ.oHfg5xNXFjhKXPygkvF3qbDb7Q_gm1HaI-wGg9w4T0mlpSnvhQAzmT_btzRuqyAWMvo6nIa4_PUYlt1ZNA3mKQ";
$db = "my_msnhomepage";
$my_username = "msnhomepage";
$mysqli = new mysqli("localhost",$my_username,"",$db);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$url = "https://api.clashofclans.com/v1/clans/" . urlencode($clantag) . "/currentwar";
$ch = curl_init($url);
$headr = array();
$headr[] = "Accept: application/json";
$headr[] = "Authorization: Bearer ". $token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$data = json_decode($res, true);
curl_close($ch);
//echo $_POST["tag"];
//echo $data["state"] . "<---";
//echo $data["message"];
//echo $data["reason"];
echo $data["clan"]["tag"] . "vs" . $data["opponent"]["tag"] . "<br>";
if($data["state"] != "warEnded")
{
echo "War must be ended!";
}
else
{
$tag1 = substr($data["clan"]["tag"], 1, strlen($data["clan"]["tag"]) - 1);
$tag2 = substr($data["opponent"]["tag"], 1, strlen($data["opponent"]["tag"]) - 1);
	$query = "CREATE TABLE IF NOT EXISTS " . $tag1 . "vs" . $tag2 . " (clantag text,opponenttag text,imageclan text,imageopponent text,size int,clan_team text,enemy_t text,starttime text,endtime text,stars int,attacks int,enemy_s int,enemy_a int,dp text,dp_e text)"; 
if($mysqli -> query($query))
    {
    	echo "Creazione tabella se non esiste...fatto!<br>";
    }
    else
    {
    	echo "Impossibile creare tabella!<br>";
    }
    $list = "";
    foreach($data["clan"]["members"] as $member)
    {
    	$tag3 = substr($member["tag"], 1, strlen($member["tag"]) - 1);
        $name = $mysqli -> real_escape_string($member["name"]);
    	$list = $list . "Tag:" .  $tag3 . "<br>Name: " . $name . "<br>Town Hall Level: " . $member["townhallLevel"] . "<br>Map Position: " . $member["mapPosition"] . "<br>" . $member["bestOpponentAttack"]["stars"] . "-starred " . $member["bestOpponentAttack"]["destructionPercentage"]. "%<br><br>";
    }
    $list_e = "";
    foreach($data["opponent"]["members"] as $member)
    {
    $tag3 = substr($member["tag"], 1, strlen($member["tag"]) - 1);
     $name = $mysqli -> real_escape_string($member["name"]);
    	$list_e = $list_e . "Tag:" .  $tag3 . "<br>Name: " . $name . "<br>Town Hall Level: " . $member["townhallLevel"] . "<br>Map Position: " . $member["mapPosition"] . "<br>" . $member["bestOpponentAttack"]["stars"] . "-starred " . $member["bestOpponentAttack"]["destructionPercentage"]. "%<br><br>";
    }
    $query = "INSERT INTO " . $tag1 . "vs" . $tag2 . " (clantag,opponenttag,imageclan,imageopponent,size,clan_team,enemy_t,starttime,endtime,stars,attacks,enemy_s,enemy_a,dp,dp_e) VALUES ('" . $tag1 . "','" . $tag2 . "','" . $data["clan"]["badgeUrls"]["small"] . "','" . $data["opponent"]["badgeUrls"]["small"] . "','" . $data["teamSize"] . "','". $list . "','" . $list_e . "','" . $data["startTime"] . "','" . $data["endTime"] . "','" . $data["clan"]["stars"] . "','" . $data["clan"]["attacks"] . "','" . $data["opponent"]["stars"] . "','" . $data["opponent"]["attacks"] . "','". $data["clan"]["destructionPercentage"] . "','" . $data["opponent"]["destructionPercentage"] . "')";
    echo "<br>" . $query . "<br>";
    if($mysqli -> query($query))
    {
    	echo "Inserimento dati...ok! <br>";
    }
    else
    {
    	echo "Impossibie inserire i dati nel DB!<br>";
    }
    $query = "CREATE TABLE IF NOT EXISTS " . $tag1 . " (tabella text)";
if($mysqli -> query($query))
    {
    	echo "Creazione tabella...fatto. <br>";
    }
    else
    {
    	echo "Impossibile creare la tabella. <br>";
    }
    $query = "INSERT INTO " . $tag1 . "(tabella) VALUES ('" . $tag1 . "vs" . $tag2 ." ')";
if($mysqli -> query($query))
    {
    	echo "Inserimento dati della tabella...ok. <br>";
    }
    else
    {
    	echo "Non sono riuscito ad inseire i dati!<br>";
    }
$mysqli -> close();
//echo "<br>" . $list;
//echo "<br>" . $list_e;
}
?>
