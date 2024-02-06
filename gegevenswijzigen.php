<?php
require_once 'src/database.php';
require_once("src/session.php");


$s = file_get_contents('forms/dstore');
$gn = unserialize($s)

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/gegevenswijzigen.css">
  <title>Jongeren Betrokken</title>
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

    <div class="container">
		<h2>Change Data</h2>
		<form name="gegevenswijzigen" action="forms/gegevenswijzigen.php" method="post">

			<!--Get forstname out of saved data.-->
			<input type="text" name="voornaam" placeholder="Voornaam: <?php echo $gn->voornaam(); ?>" /><br>

			<!--Get insertion out of saved data.-->
			<input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel: <?php echo $gn->tussenvoegsel(); ?>" /><br>

			<!--Get last name out of saved data.-->
			<input type="text" name="achternaam" placeholder="Achternaam: <?php echo $gn->achternaam();  ?>" /><br>

			<!--Get email out of saved data.-->
			<input type="text" name="email" placeholder="E-mail: <?php echo $gn->email(); ?>" /> <br>

			<input type="password" name="oudwachtwoord" placeholder="Old Password" /><br>
			<input type="password" name="nww1" placeholder="New Password" /><br>
			<input type="password" name="nww2" placeholder="Confirm Password" /><br>
			<Input type="submit" name="submit" value="Save "><br>
			<?php
			//displays error message
			if (isset($_SESSION['ERRORS'])) {
				echo $_SESSION['ERRORS'];
				unset($_SESSION['ERRORS']);
			}
			?>
		</form>
	</div>

</body>

</html>