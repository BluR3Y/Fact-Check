<?php

	include 'db_connection.php';
	
	$database = new Database;
	$database->connect();
	
	$stmt = "INSERT INTO users (user_name,user_email,user_password,recov_question,recov_answer) VALUES ('john','lol@gmail.com','password123','what','nothing')";
	$status = $database->query($stmt);
	
	if($status)
	{
			echo "Connected Successfully";
	}else if($status == false){
			echo "Error: ". $stmt . "<br>" . $conn->error;
	}


	// testing--------------

	$user_id=2;
	$getFollowings = "SELECT following_community FROM followings WHERE following_user=$user_id";
	$FollowingStatus = $database->query($getFollowings);
	while($row=$FollowingStatus->fetch_assoc())
	{
		echo "<h1>".$row['following_community']."</h1>";
	}

	// $commID = 1;
	// $getStmt = "SELECT community_name FROM communities WHERE community_id=$commID";
	// $getStatus = $database->query($getStmt);
	// while($row=$getStatus->fetch_assoc())
	// {
	// 	echo "<h1>".$row['community_name']."</h1>";
	// }

	
?>
