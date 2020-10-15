<?php
	include('../config.php');
?>

<html>
	<head>
		<title>Database Dump</title>
	</head>
	<body>

<?php
//We display all tables
//
//Users
//We get all rows of users

echo "user<BR>";
echo "id,username,password,e-mail,salt<BR>";

$req = mysqli_query($link, 'select * from users');
while($dnnn = mysqli_fetch_array($req))
{
	echo $dnn['id'].",";
	echo htmlentities($dnnn['username'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['password'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['email'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['salt'], ENT_QUOTES, 'UTF-8')."<BR>";
}

//Users
//We get all rows of users
echo "<BR>pm<BR>";
echo "id,title,sender,recipient,message,timestamp,tag<BR>";
$req = mysqli_query($link, 'select * from pm');

while($dnnn = mysqli_fetch_array($req))
{
	echo $dnnn['id'].",";
	echo htmlentities($dnnn['title'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['sender'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['recipient'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['message'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities(date("Y-m-d H:i:s", $dnnn['timestamp']), ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['tag'], ENT_QUOTES, 'UTF-8')."<BR>";
}

//Encryption keys for messages
//We get all rows of users
echo "<BR>messagekeys<BR>";
echo "user1,user2,mskey<BR>";
$req = mysqli_query($link, 'select * from messagekeys');

while($dnnn = mysqli_fetch_array($req))
{
	echo htmlentities($dnnn['user1'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['user2'], ENT_QUOTES, 'UTF-8').",";
	echo htmlentities($dnnn['mskey'], ENT_QUOTES, 'UTF-8')."<BR>";
}
?>
	</body>
</html>
