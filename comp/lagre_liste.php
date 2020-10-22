<?php
	include('comp/handleliste.php');

	$brukernavn = "";
	$tilkobling = mysqli_connect("localhost", "root", "", "loginregister");
	$ListeNavn = "";
	$errors = array();

	if(isset($_POST['lagre'])) {
		
		$ListeNavn = mysqli_real_escape_string($tilkobling, $_POST['liste_navn']);

		if(empty($ListeNavn)){
			array_push($errors, "Du må gi listen et navn!");
		
		} else {

		$sql = "SELECT * FROM `orders` WHERE `liste_navn` ='$ListeNavn';";
            $result = mysqli_query($tilkobling, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                array_push($errors, "Dette navnet er allerede tatt");
              
        } else {

		foreach ($_SESSION['shopping_cart'] as $key) {
	
	
			$brukernavn = $_SESSION['bruker_id'];
			$prd_name = $key['name'];
			$prd_quantity = $key['quantity']; 
			$prd_price = $key['price'];
			$prd_price_total = $prd_quantity * $prd_price;


			$sql = "INSERT INTO `orders` (`liste_navn`, `varer`, `total`, `price`, `price_total`, `bruker_bruker_id`)
						VALUES ('$ListeNavn','$prd_name', '$prd_quantity', '$prd_price', '$prd_price_total', '$brukernavn');";

			mysqli_query($tilkobling, $sql);
			header('location: liste.php?lagret');
			
			}

		$_SESSION['shopping_cart'] = array();

		}
	}

}
?>