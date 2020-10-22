<?php 

	session_start();

	$username = "";
	$email = "";
	$errors = array();
	$success = array();

	//connect to the database
	$tilkobling = mysqli_connect("localhost", "root", "", "loginregister");

//Hvis register knappen er trykket
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($tilkobling, $_POST['username']);
		$email = mysqli_real_escape_string($tilkobling, $_POST['email']);
		$password_1 = mysqli_real_escape_string($tilkobling, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($tilkobling, $_POST['password_2']);
//Ekstra informasjon om du vil legge til ekstra informasjon, har ingen error melding tilknyttet fordi det er optional å legge til. 
		$fornavn = mysqli_real_escape_string($tilkobling, $_POST['fornavn']);
		$etternavn = mysqli_real_escape_string($tilkobling, $_POST['etternavn']);
		$telefonnummer = mysqli_real_escape_string($tilkobling, $_POST['nummer']);
		$adresse = mysqli_real_escape_string($tilkobling, $_POST['adresse']);
		$postnummer = mysqli_real_escape_string($tilkobling, $_POST['postnummer']);

		// ensure that form fields are filled properly

		if (empty($username)) {
			array_push($errors, "Du må fylle inn brukernavnet ditt");
		}
		if (empty($email)) {
			array_push($errors, "Du må fylle inn emailen din");
		}
		if (empty($password_1)){
			array_push($errors, "Du må fylle inn passord");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "De to passordene stemmer ikke ilag");
		}
		//Sjekker om brukernavnet er alerede tatt
		$sql = "SELECT * FROM bruker WHERE brukernavn ='$username';";
            $result = mysqli_query($tilkobling, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                array_push($errors, "Brukernavet er allerede tatt");
               
            }
        //Verifiserer om email er gyldig eller ikke
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        	array_push($errors, "Du må skrive en gyldig emailadresse!"); 
        }   

		// Hvis den teller ingen errorer, så fortsett videre å insert data til databasen. 
		if (count($errors) == 0) {
			$password = password_hash($password_1, PASSWORD_DEFAULT); //encrypt password before storing in datavase (security)
			$sql = "INSERT INTO bruker (brukernavn, email, passord, fornavn, etternavn, telefonnummer, adresse, postnummer) 
						VALUES ('".$username."', '".$email."', '".$password."', '".$fornavn."', '".$etternavn."', '".$telefonnummer."', '".$adresse."', '".$postnummer."')";
			mysqli_query($tilkobling, $sql);
		//login delen nedover + session_start()
			$_SESSION['username'] = $username; 
			$_SESSION['bruker_id'] = "Du er nå logget inn"; 
			
			header('location: index.php?success'); //redirect til hjemmeside 
			
		} 
		
	}

// Log user in fra login side 
    if (isset($_POST['login'])) {
        $username = $tilkobling->real_escape_string($_POST['username']);
        $password = $tilkobling->real_escape_string($_POST['password']);

        // ensure that form fields are filled properly

        if (empty($username)) {
            array_push($errors, "Du må fylle inn brukernavnet ditt");
        }
        if (empty($password)) {
            array_push($errors, "Du må fylle inn passordet ditt");
        }

        if (count($errors) == 0 ) {
            $sql = "SELECT * FROM bruker WHERE brukernavn ='$username';";
            $result = mysqli_query($tilkobling, $sql);
            $resultCheck = mysqli_num_rows($result);
            $resultRow = mysqli_fetch_array($result);
            if(!$resultCheck > 0) {
                array_push($errors, "Bruker/passord stemmer ikke");
               
            } else {
                $dbPwd = $resultRow['passord'];
                $passwordCheck = password_verify($password, $dbPwd); //encrypt passord før den blir sammenlignet med databasen. 
                if($passwordCheck == true) {
                    // log bruker inn 
                    $_SESSION['username'] = $resultRow['brukernavn']; 
                    $_SESSION['bruker_id'] = $resultRow['bruker_id'];
              
                    header('location: index.php?success'); //redirect til hjemmeside 
                    exit();
                }
            }
        }
    }
//logout
    if (isset($_POST['logout'])) {
    	session_start();
    	session_unset();
    	session_destroy();
    	header('location: index.php?logout');
    }

//Legg til egne varer i databasen 


	if (isset($_POST['add'])) {
		$vare = $tilkobling->real_escape_string($_POST['varer_navn']);
		$bilde = $_FILES['bilde'];
		$pris = $tilkobling->real_escape_string($_POST['pris']); 
		$butikk = $tilkobling->real_escape_string($_POST['butikk']);
		$kategori = $tilkobling->real_escape_string($_POST['kategori']);
	

		//Last opp bilde, separere ulike atttributer til en bilde link
		$fileName = $_FILES['bilde']['name'];
		$fileTmpName = $_FILES['bilde']['tmp_name'];
		$fileSize = $_FILES['bilde']['size'];	
		$fileError = $_FILES['bilde']['error'];
		$fileType = $_FILES['bilde']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'svg', 'JPG');

		if (!in_array($fileActualExt, $allowed)) {
			array_push($errors, "Feil bilde fil");
			} elseif (!$fileError == 0) {
				array_push($errors, "Error");
			} elseif ($fileSize > 1000){
				array_push($errors, "filen er for stor, maks 1MB (1000 KB)");
			} 
		else {

			if (empty($vare)) {
				array_push($errors, "Du må fylle inn navn på varen din");
			}
			if (empty($bilde)) {
				array_push($errors, "Du må legge til et bilde");
			}
			if (empty($pris)){
				array_push($errors, "Du må fylle inn pris");
			}
			if (empty($butikk)) {
				array_push($errors, "Du må fylle inn en eller flere butikker");
			}
			
			// If there are no errors, save user to database
			if (count($errors) == 0) {
				$fileNameNew = uniqid('', true). ".". $fileActualExt;
					$fileDestination = 'bilder/'.$fileNameNew;
					if(move_uploaded_file($fileTmpName, $fileDestination)) {
						$sql = "INSERT INTO `matvare_id` (`varer_navn`, `bilde`, `pris`, `butikk`, `kategori_kategori_id`) 
									VALUES ('$vare', '$fileDestination', '$pris', '$butikk', '$kategori');";

						mysqli_query($tilkobling, $sql);

						//$_SESSION['varer_navn'] = $vare; 
						//$_SESSION['mat_id'] = "Din vare er nå lagt til!"; 
						
					}
							
				}
			}
		}

?>