<?php
if(isset($_POST["sent"]))
{
	$query5="SELECT * FROM eene_ep_votes WHERE id=" . $_POST["sent"] . " AND IP=" . $_SERVER['REMOTE_ADDR'];
    $result5=mysqli_query($con, $query5);
    if(mysqli_num_rows($result5)==0)
    {
    	$query4="SELECT * FROM eene_ep_rating WHERE id=" . $_POST["sent"];
    	$result3=mysqli_query($con, $query4);
    	$row=mysqli_fetch_assoc($result3);
    	$newRating = $row["rating"] + $_POST["rating"];
    	$newNumber = $row["number"] + 1;
		$query3="UPDATE eene_ep_rating SET rating= " . $newRating . ", number=" . $newNumber . " WHERE id=" . $_POST["sent"];
    	mysqli_query($con, $query3);
        $query6="INSERT INTO en_episode_votes (id, IP) VALUES (" . $_POST["sent"] . "," . $_SERVER['REMOTE_ADDR'] . ")";
        mysqli_query($con, $query6);    
    }
    else
    {
    	echo "Already voted";
    }
	
}
?>
