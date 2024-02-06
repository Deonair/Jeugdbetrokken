<!DOCTYPE html>
<html>

<head>
    <title>Jongeren Betrokken</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link  text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                        <?php
                        session_start();
                        if (isset($_SESSION['gebruiker_data'])) {
                            echo ' <a class="nav-link text-light" href="src/uitloggen.php?logout=true">Loguit</a>';
                        } else {
                            echo '<a class="nav-link text-light" href="login.php">Login</a>';
                        } ?>
                    </li>

            </ul>
        </div>
    </nav>
    <div class="loginbox">
            <img src="img/icon.png" class="avatar">
            <h1>Register</h1>
            <form name="gebruikers" action="forms/register.php" method="post">
                <input type="text" name="voornaam" placeholder="Voornaam" />
                <input type="text" name="tussenvoegsels" placeholder="Tussenvoegsel" />
                <input type="text" name="achternaam" placeholder="Achternaam" />
                <input type="text" name="email" placeholder="E-mail" />
                <input type="password" name="wachtwoord" placeholder="Password" />
                <input type="password" name="wachtwoord2" placeholder="Confirm Password" />
                <input type="submit" name="submit" value="Register" />
                <a href="login.php">Already have a account? Click here!</a><br>
                <?php
                //error message en toont de error   
                if (isset($_SESSION['ERRORS'])) {
                    echo $_SESSION['ERRORS'];
                    unset($_SESSION['ERRORS']);
                    // echo"Dit werkt niet";
                }


                ?>
            </form>


            <br>

        </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>