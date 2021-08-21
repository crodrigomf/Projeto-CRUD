
<?php

define("APP_NAME", "Acervo de Livros");

$pdo = new PDO("mysql:dbname=livros","root");
session_start();

function is_logged(){
	if (isset($_SESSION['user_id'])) {
		return true;
	}
	return false;
}

?>