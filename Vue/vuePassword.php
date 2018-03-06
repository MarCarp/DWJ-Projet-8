<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
	<form method='post' action='admin.php'>
		<label>Nom : </label><br/>
		<input type="text" name="adminId"><br/>
		<label>Mot de passe : </label><br/>
		<input type="password" name="adminPass"><br />
		<input type="submit" value="GO">
	</form>
</body>
</html>