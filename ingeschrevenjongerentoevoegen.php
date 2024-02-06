<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/welkom.css">
  <title>Welkomepage</title>
</head>

<body>
  <!--navbar-->
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
                        
                        if (isset($_SESSION['gebruiker_data'])) {
                            echo ' <a class="nav-link text-light" href="src/uitloggen.php?logout=true">Loguit</a>';
                        } else {
                            echo '<a class="nav-link text-light" href="login.php">Login</a>';
                        } ?>
                    </li>

            </ul>
        </div>
    </nav>
    <form name="nieuwjongeren" action="forms/ingeschreven.php" method="post">
                <input type="text" name="voornaam" placeholder="Voornaam" /><br>
                <input type="text" name="tussenvoegsels" placeholder="Tussenvoegsel" /><br>
                <input type="text" name="achternaam" placeholder="Achternaam" /><br>
                <input type="text" name="roepnaam" placeholder="roepnaam" /><br>
                <input type="text" name="huisnummer" placeholder="huisnummer" /><br>
                <input type="text" name="straat" placeholder="straat" /><br>
                <input type="text" name="woonplaats" placeholder="woonplaats" /><br>
                <input type="text" name="postcode" placeholder="postcode" /><br>
                <input type="date" name="geboortedatum" placeholder="Geboortedatum" /><br>
                <input type="date" name="inschrijfdatum" placeholder="Inschrijfdatum" />  <br>          
                <input type="text" name="nationaliteit" placeholder="Nationaliteit" /><br>
                <input type="text" name="opleiding" placeholder="opleiding" /><br>
                <input type="text" name="droombaan" placeholder="droombaan" /><br>
                <input type="text" name="baan" placeholder="baan" /><br>
                <div class="form-group">
      
      <select name="activiteitID">
        <!-- pakt alle activiteiten van de database en laat ze zien in een dropdown -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "jb");
        $sql = mysqli_query($conn, "SELECT * FROM activiteit");

        while ($row = $sql->fetch_assoc()) {

          echo "<option value='" . $row['activiteitID'] . "'>" . $row['naam'] . "</option>";
        }
        ?>
      </select>
    <br>
                <input type="submit" name="submit" value="Voeg toe" />
                
                <?php
                //error message en toont de error   
                if (isset($_SESSION['ERRORS'])) {
                    echo $_SESSION['ERRORS'];
                    unset($_SESSION['ERRORS']);
                    // echo"Dit werkt niet";
                }


                ?>
            </form>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>