<?php 
	$connect = mysqli_connect("localhost", "root", "", "loginregister");
	$query = "SELECT * FROM matvare_id ORDER BY mat_id ASC";
	$result = mysqli_query($connect, $query);
	$connect->set_charset("utf-8");

	if ($result):
		if(mysqli_num_rows($result) > 0):
			while($product = mysqli_fetch_assoc($result)):
						//print_r($product);
?>