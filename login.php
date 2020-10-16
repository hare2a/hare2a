<!-- Authenticate a registered user. -->
<?php
include('config.php');

// if the session is active redirect to the landing page
if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['email'], $_POST['password'])) {
    $ousername = '';
	// check if the form has been sent
	if(isset($_POST['email'], $_POST['password']))
	{
		// remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['email']);
			
			$username  = mysqli_real_escape_string($link, stripslashes($_POST['email']));
			$password  = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysqli_real_escape_string($link, $_POST['email']);
			$password = $_POST['password'];
		}
		// fetch the password of the user
		$req = mysqli_query($link, 'select password,id,salt from users where email="'.$email.'"');
		$dn  = mysqli_fetch_array($req);
		$password = hash("sha512", $dn['salt'].$password); // salt the password and hash it
		
		// compare the salted password hash with the real one, and check if the user exists
		if ($dn['password'] == $password and mysqli_num_rows($req)>0) {
			// save the user name in the session username and the user Id in the session userid
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['emailid'] = $dn['id'];
			
			header("Location: index.php");
		}
		else {
			// Otherwise, the credentials are incorrect
			$message = 'Incorrect username or password!';
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/style.css" rel="stylesheet" title="Style" />
        <title>Login</title>
    </head>
    <body>
		<?php if(isset($message)) echo '<div class="message">'.$message.'</div>'; ?>
		<div class="content">
			<form action="login.php" method="post">
				<div class="center">
					<label for="email">email</label><input type="text" name="email" id="email" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" /><br />
					<label for="password">Password</label><input type="password" name="password" id="password" /><br />
					<input type="submit" value="Log in" />
				</div>
			</form>
		</div>
        <div class="foot"><a href="index.php">Home</a></div>
	</body>
</html>
