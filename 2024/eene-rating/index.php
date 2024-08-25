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
$query = "SELECT * FROM eene_ep";
$result = mysqli_query($con, $query);

$rows=mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($rows as $row) {
$query2 = "SELECT rating,number FROM eene_ep_rating WHERE id=" . $row["id"];
$grab= mysqli_query($con, $query2);
$rating=mysqli_fetch_assoc($grab);
echo "<div class=\"episode\">
<img src=\"./thumb/1.png\" width=10% height=10%/>
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
<input type=\"hidden\" name=\"sent\" value=" . $row["id"] . ">
<input type=\"submit\" value=\"Rate\">
</form>" .
$rating["rating"] / $rating["number"]
.
"<img src=\"./res/star.png\" height=16px width=16px/>
</div>";
}

mysqli_close($con);
?>

</body>
</html>
