<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="Content/Css/styleAdmin.css">
</head>
<body>
	<form method='post' action='index.php?action=admin'>
		<label>Nom : </label><br/>
		<input type="text" name="adminId"><br/>
		<label>Mot de passe : </label><br/>
		<input type="password" name="adminPass"><br />
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>