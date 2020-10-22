<?php 
		
		$brukernavn = $_SESSION['bruker_id'];

		$tilkobling = mysqli_connect("localhost", "root", "", "loginregister");
		$sql = "SELECT * FROM orders WHERE bruker_bruker_id = '$brukernavn'  ORDER BY varer ASC ";

		$result = mysqli_query($tilkobling, $sql);
?>