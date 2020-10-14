<!-- Shows a list of users and their emails. -->
<?php
include('config.php');
?>



	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="assets/style.css" rel="stylesheet" title="Style" />
		<title>List of users</title>
	</head>
	<body>
		<div class="content">
			This is the list of members:
			<table>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Email</th>
				</tr>

				<?php
				// fetch the IDs, usernames and emails of users
				$req = mysqli_query($link, 'select id, username, email from users');
				while ($dnn = mysqli_fetch_array($dnn)) {
				?>

				<tr>
					<td class="left"><?php echo $dnn['id']; ?></td>
					<td class="left"><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></td>
					<td class="left"><?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?></td>
				</tr>

				<?php
				}
				?>
			</table>
		</div>
		<div class="foot"><a href="index.php">Home</a></div>
	</body>
</html>
