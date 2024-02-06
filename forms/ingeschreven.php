<?php
    require_once '../src/database.php';

    session_start();

    //Roep class gebruikers op
    $user = new Gebruikers();
    //Zet POST values in variablen
    $post = $_POST;
    //Put title in variable
    $roepnaam = $post['roepnaam'];
    $tussenvoegsel = $post['tussenvoegsel'];
    $achternaam = $post['achternaam'];
    $inschrijfdatum = $post['inschrijfdatum'];
    $activiteitcode = $post['activiteitcode'];
    $minderjarig =$post['minderjarig'];
   
    //Als er op de submit button wordt gedrukt.
    if (isset($_POST['submit'])) {

      


//If error send display error message on register
    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../ingeschrevenjongerentoevoegen.php');
        //   echo $_SESSION['ERRORS'];  
        //Creates new user if everything has been filled in correctly
    } else {
        //If everything is correct create user and send them to the login form
        $user->createJongeren($roepnaam, $tussenvoegsel, $achternaam, $inschrijfdatum, $activiteitcode, $minderjarig);
        header('Location: ../contact.php');
    }
}
