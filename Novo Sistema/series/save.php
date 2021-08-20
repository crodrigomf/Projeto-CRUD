<?php

	include  '../init.php';

	if(!is_logged()){
		header('location: /');
		exit();
	}

	$series =$_POST['serie'];

	$stmt = $pdo->prepare('insert into series (serie) values (?)');
	$stmt->execute([$series]);

	header('location: /home.php');
?>