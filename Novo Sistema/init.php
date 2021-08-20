
<?php

define("APP_NAME", "Funko System");

$pdo = new PDO("mysql:dbname=funkos","root");
session_start();

function is_logged(){
	if (isset($_SESSION['user_id'])) {
		return true;
	}
	return false;
}

?>