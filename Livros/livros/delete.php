<?php

	include  '../init.php';

	if(!is_logged()){
		header('location: /');
		exit();
	}

$id = $_GET['id'];

$stmt = $pdo->prepare('delete from livros where id = ?');
$stmt->execute([$id]);

header('location: /home.php');

?>