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

    <div class="row text-center">
        <h1 class="text-center my-3">Factuur</h1>
        <div class="table-responsive">
            <table class="table mt-4 container">
                <thead>
                    <tr>
                        <th scope="col">Roepnaam</th>
                        <th scope="col">Achternaam</th>
                        <th scope="col">Activiteit</th>
                        <th scope="col">Kenteken</th>
                        <th scope="col">Prijs Per Dag</th>
                        <th scope="col">vanaf</th>
                        <th scope="col">Tot</th>


                    </tr>
                </thead>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "jb");
                if ($conn->connect_error) {
                    die("connection Failed");
                }
                $sql = "SELECT * FROM ingeschrevenjongeren INNER JOIN activiteit ";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {

                ?>
                        <tr>
                            <td><?php echo $row["roepnaam"]; ?></td>

                            <td><?php echo $row["achternaam"]; ?></td>
                            <td><?php echo $row["naam"]; ?></td>
                            <td><?php echo $row["type"]; ?></td>
                            <td><?php echo $row["geboortedatum"]; ?></td>
                            <td><?php echo $row["huisnummer"]; ?></td>
                            <td><?php echo $row["achternaam"]; ?></td>

                        </tr>
                <?php }
                } ?>


                </tbody>
            </table>
        </div>
    </div>

    <hr>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>