<?php
	require_once 'database.php'; //call class file
	session_start(); //Start session
	
	
	$session = new Gebruikers();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if(!$session->is_loggedin())
	{
		// session no set redirects to login page
		header('Location: login.php');
    }
	
	
    ?>