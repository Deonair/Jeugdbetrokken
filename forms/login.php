<?php
require_once('../src/database.php');
//start sessie
session_start();
//Maak nieuw Dagboek
$gebruiker = new Gebruikers();
//passed post variables
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

//filter emails naar lowerstring
$email = strtolower($email);
//Voer inlog functie uit
$ingelogd = $gebruiker->login($email, $wachtwoord);

if (is_bool($ingelogd)) {
    //Zet user values in sessie
    $_SESSION['gebruiker_data'] = serialize($gebruiker); 
    file_put_contents('dstore', $_SESSION['gebruiker_data']);
    //Volgende pagina
    header('Location: ../welkom.php');
} elseif(is_string($ingelogd)) {
    echo $ingelogd;
    
}else{
    $_SESSION['ERRORS'] = "Het ingevoerde email en/of wachtwoord zijn onjuist.";
    //Volgende pagina
    header('Location: ../login.php');
}

if (isset($_POST['submit'])) {
   
    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location: ../login.php');
        //   echo $_SESSION['ERRORS'];  
    }
    else {
        //If everything is correct send user to welcome page
        $ingelogd = $gebruiker->login($email, $wachtwoord);
                header('Location: ../welkom.php');
    }
}
