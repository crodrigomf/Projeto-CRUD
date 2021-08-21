<?php include '../init.php' ?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APP_NAME ?> - Registrar usuário</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<h1>Registrar usuário </h1>

<form action="save.php" method="POST">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="pw" placeholder="senha">
	<input type="password" name="pw2" placeholder="confirme a senha">
	<input type="submit">
</form>

<a href="/" class="btn"> Home </a>
<a href="/auth/login.php" class="btn">Autenticar </a>


</body>
</html>