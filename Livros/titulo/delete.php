<?php

	include  '../init.php';

	if(!is_logged()){
		header('location: /');
		exit();
	}

$id = $_GET['id'];

$stmt = $pdo->prepare('delete from titulo where id = ?');
$stmt->execute([$id]);

header('location: /home.php');

?>