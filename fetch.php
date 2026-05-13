<?php

require_once("config.inc.php");
require_once("classes.php");

function fetchProducts($pdo) { //fetch all products from DB to array
	$sql = "SELECT * FROM Products";
	$result = $pdo->query($sql);
	$products = [];
	while ($p = $result->fetchObject('Product')) {
		$products[] = $p;
	}
	return $products;
}

function fetchAdmins($pdo) { //fetch all admins from DB to array
	$sql = "SELECT * FROM admin";
	$result = $pdo->query($sql);
	$admins = [];
	while ($d = $result->fetchObject('Admin')) {
		$admins[] = $d;
	}
	return $admins;
}

function findAdminByEmail($pdo, $usrEmail){
	//Optimize: Sanitizing is needed for usr email but the method in slide: mysqli_real_escape_string(); need an argument that I don't have ($link)
	$sql = "SELECT * FROM Admin WHERE Email = :email";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':email', $usrEmail);
	$statement->execute();
	return $statement->fetchObject('Admin');
	}

?>


