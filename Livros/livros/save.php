<?php

	include  '../init.php';

	if(!is_logged()){
		header('location: /');
		exit();
	}

	$nome = $_POST['nome'];
	$serie_id = $_POST['serie_id'];
	$stmt = $pdo->prepare('insert into livros (nome, serie_id, user_id) values (?, ?, ?)');
	$stmt->execute([$nome, $serie_id, $_SESSION['user_id']]);

	header('location: /home.php');
?>