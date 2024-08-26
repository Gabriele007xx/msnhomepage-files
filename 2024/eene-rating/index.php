<?php require 'db.php';?>
<?php require 'voting.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Rate EEnE episodes!</title>
  <link rel="stylesheet" href="./style.css"/>
</head>
<body>
<h1>EEnE episode rating</h1>
<?php 
$resultsPerPage=7;
if(!isset($_GET["offset"]))
{
	$offset = 0;
}
$query = "SELECT * FROM eene_ep LIMIT " . $resultsPerPage . " OFFSET " . $offset*$resultsPerPage;
$result = mysqli_query($con, $query);
$numPages = floor(mysqli_num_rows($result) / $resultsPerPage);
if($numPages<1)
{
	$numPages=1;
}
$rows=mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($rows as $row) {
$query2 = "SELECT rating,number FROM eene_ep_rating WHERE id=" . $row["id"];
$grab= mysqli_query($con, $query2);
if(mysqli_num_rows($grab)==0)
{
$valueRating="N/A";
$epNum="1";
}
else
{
$rating=mysqli_fetch_assoc($grab);
$valueRating=$rating["rating"] / $rating["number"];
$epNum=$row["id"];
}
$class="episode1";
if($epNum%2==0)
{
$class="episode2";
}
echo "<div class=\"" . $class .  "\">
<img src=\"./thumb/" . $epNum . ".png\" width=10% height=10%/>
<span>" . $row["title"] . "</span>
<p>" . $row["description"] ."</p>
<form action=\"index.php\" method=POST>
<select name=\"rating\">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
</select>
<input type=\"hidden\" name=\"sent\" value=" . $epNum . ">
<input type=\"submit\" value=\"Rate\">
</form>" .
$valueRating
.
"<img src=\"./res/star.png\" height=16px width=16px/>
</div>";
}
mysqli_close($con);
?>
<div class="links">
<?php
$html = "";
for($i=0;$i<$numPages;$i++)
{
	$html = $html . "<a href=\"./index.php?offset=" . $i . "\">". $i+1 ."</a>";
}
echo $html;
?>
</div>
</body>
</html>
