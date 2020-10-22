<?php 

session_start();
$product_ids = array();
$cart = array(); 
//session_destroy();

//Sjekk om add to cart knappen har blitt submitta
if(filter_input(INPUT_POST, 'add_to_cart')){
	if(isset($_SESSION['shopping_cart'])){

		//Hold styr på kor mange produkter som er i handlelisten
		$count = count($_SESSION['shopping_cart']);

		//lag følgende array for matchende array nøkler til product iders 
		$product_ids = array_column($_SESSION['shopping_cart'], 'id');

		if (!in_array(filter_input(INPUT_GET,'id'), $product_ids)){
		$_SESSION['shopping_cart'][$count] = array 
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);	

			$newVare = $_SESSION['shopping_cart'][$count];
		}
		else {

			//productet finnes allrede, istedet for å legge det til to egne ganger, øk mengden av produktet. 
			//match array key for id av produktet som er lagt til å lista
			for ($i = 0; $i < count($product_ids); $i++) {
				if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){

					//legg til gjenstand mengde til eksisternde produkter i array
					$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
					$newVare = $_SESSION['shopping_cart'][$i];
				}	
			}
		}
	}
	else { // Hvis shoppingcart finnes ikke, lag første produkt med array key 0 
		//lag array med submitted form data, start fra key 0 og fill med verdi
		$_SESSION['shopping_cart'][0] = array 
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);
	}

}

if (filter_input(INPUT_GET, 'action') == 'delete'){
	// loop gjennom alle produkter i shopping kart helt til den matcher med GET id variabelen
	 foreach ($_SESSION['shopping_cart'] as $key => $product){
	 	if ($product['id'] == filter_input(INPUT_GET, 'id')){
	 		//Fjern product fra shopping cart når den matcher med GET id 
	 		unset($_SESSION['shopping_cart'][$key]);
	 		

	 	}
	
	 }
	 //reset session array keys så de matcher med $product id numerisk array 
	 $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
	
}


//pre_r($_SESSION);

function pre_r($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}


?>