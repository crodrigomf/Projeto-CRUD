<?php

	include  '../init.php';

	if(!is_logged()){
		header('location: /');
		exit();
	}

	$serie =$_POST['serie'];

	$stmt = $pdo->prepare('insert into titulo (serie) values (?)');
	$stmt->execute([$serie]);

	header('location: /home.php');
?>