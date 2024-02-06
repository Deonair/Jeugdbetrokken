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

    <div class="container">
		<form name="deleteaccount" method="post" action="forms/accountverwijderen.php">
			<h2>Are you sure that you want to delete your account</h2>
			<p id="red">Warning this will delete everything you have ever made!</p>
			<button>Yes i confirm!</button>

		</form>
	</div>
</body>

</html>