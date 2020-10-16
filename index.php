<!-- Home page. App starts here. -->
<?php
include('config.php');
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/style.css" rel="stylesheet" title="Style" />
        <title>Home</title>
    </head>
    <body>
        <div class="content">
<?php
//We display a welcome message and, if the user is logged in, we display the username
?>

Hi
<membername>
<?php
if(isset($_SESSION['username'])) {
	echo ' '.htmlentities($_SESSION['email'], ENT_QUOTES, 'UTF-8');}
?>
</membername>!

<br />
welcome to our Website <br /><br />
<?php
//If the user is logged in, we display links to see the list of users, his/her pms and a link to log out
if (isset($_SESSION['username'])) {
	echo 'Please see here for a <a href="users.php">list of all users</a> you can send a message to.<br /><br />';

    echo '<a href="new_pm.php" class="link_new_pm">Write new message</a><br />';
	//We display the links
?>
<a href="mailbox.php" class="link_new_pm">Mailbox</a>
<br /><br />
<a href="logout.php">Logout</a>
<?php
}
else {
//Otherwise, we display a link to sign up / log in
?>
<a href="login.php">Login</a><br />
<a href="sign_up.php">Signup</a>
<?php
}
?>
		</div>
	</body>
</html>
