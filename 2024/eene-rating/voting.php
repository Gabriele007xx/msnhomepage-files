<?php
if(isset($_POST["sent"]))
{
	$query4="SELECT * FROM eene_ep_rating WHERE id=" . $_POST["sent"];
    $result3=mysqli_query($con, $query4);
    $row=mysqli_fetch_assoc($result3);
    $newRating = $row["rating"] + $_POST["rating"];
    $newNumber = $row["number"] + 1;
	$query3="UPDATE eene_ep_rating SET rating= " . $newRating . ", number=" . $newNumber . " WHERE id=" . $_POST["sent"];
    mysqli_query($con, $query3);
}
?>
