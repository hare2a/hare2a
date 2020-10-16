<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
else {
	// log the user out by deleting the username and userid from the session
	unset($_SESSION['email'], $_SESSION['userid']);
	session_destroy();
	
	// redirect to the landing page
    header("Location: index.php");
    exit;
}
?>
