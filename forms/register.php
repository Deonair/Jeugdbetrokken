<?php
    require_once '../src/database.php';

    session_start();

    //Roep class gebruikers op
    $user = new Gebruikers();
    //Zet POST values in variablen
    $post = $_POST;
    $voornaam = $post['voornaam'];
    $tussenvoegsel = $post['tussenvoegsels'];
    $achternaam = $post['achternaam'];
    $email = $post['email'];
    $wachtwoord = $post['wachtwoord'];
    $wachtwoord2 = $post['wachtwoord2'];

    //Hoofdletters naar kleine letters
    $email = strtolower($email);

    //Als er op de submit button wordt gedrukt.
    if (isset($_POST['submit'])) {

      

    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../register.php');
        //   echo $_SESSION['ERRORS'];  
    }
    //Checks if input is empty
    if (!empty($wachtwoord)) {
        $uppercase = preg_match('@[A-Z]@', $wachtwoord);
        $lowercase = preg_match('@[a-z]@', $wachtwoord);
        $number    = preg_match('@[0-9]@', $wachtwoord);
        $specialChars = preg_match('@[^\w]@', $wachtwoord);
    } else {
        $error[] = "Vul een wachtwoord in";
    }

    //If the information doesnt match!
    if ($naam_match !== true && $achternaam_match !== true && $email_match !== true && $naam_match !== true && $wachtwoord !== $wachtwoord2) {
        $error[] = "De wachtwoorden komen niet overeen.";
    }
//If error send display error message on register
    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../register.php');
        //   echo $_SESSION['ERRORS'];  
        //Creates new user if everything has been filled in correctly
    } else {
        //If everything is correct create user and send them to the login form
        $user->create($voornaam, $tussenvoegsel, $achternaam, $email, $wachtwoord, $wachtwoord2);
        header('Location: ../login.php');
    }
    }
?>


