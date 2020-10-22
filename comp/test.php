?php
    $tilkobling = mysqli_connect("localhost", "root", "root", "turer");
    session_start();

    $username = "";
    $email = "";
    $errors = array();

//Hvis register knappen er trykket
    if (isset($_POST['register'])) {
        $username = $tilkobling->real_escape_string($_POST['navn']);
        $email = $tilkobling->real_escape_string($_POST['email']);
        $dato= $tilkobling->real_escape_string($_POST['dato']);
        $fjell = $tilkobling->real_escape_string($_POST['fjell']);

        // ensure that form fields are filled properly

        if (empty($username)) {
            array_push($errors, "Du må fylle inn brukernavnet ditt");
        }
        if (empty($email)) {
            array_push($errors, "Du må fylle inn emailen din");
        }
        if (empty($dato)){
            array_push($errors, "Du må fylle inn dato");
        }
        if (empty($fjell)) {
            array_push($errors. "Du må velge et fjell");
        }


        // If there are no errors, save user to database
        if (count($errors) == 0) {

            $sql = "INSERT INTO paameldinger (navn, email, dato, fjell) 
                        VALUES ('".$username."', '".$email."', '".$dato."'. '".$fjell."')";
            mysqli_query($tilkobling, $sql);
        //login delen nedover + session_start()
            $_SESSION['username'] = $username; 
            $_SESSION['bruker_id'] = "Du er nå logget inn"; 
            header('location: index.php?sucess'); //redirect til hjemmeside 
        } 

    }