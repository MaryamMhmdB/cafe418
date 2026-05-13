<?php

require_once("config.inc.php");

class Product {
	public $productID;
	public $PName;
	public $Category;
	public $Price;
	public $Size;
	public $stockQuantity;
	public $PDesc;
	public $ingredients;
	public $Allergens;
	public $PImg;
	public $created_by;

}

class Admin{

	public $adminID ;
	public $Password ;
	public $Phone ;
	public $Email ;
	public $FName ;
	public $LName ;
}

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


