<?php

require_once("config.inc.php");
require_once("classes.php");

function fetchProducts($pdo) {
    $sql = "SELECT * FROM Products";
    $result = $pdo->query($sql);

    $products = [];

    while ($p = $result->fetchObject('Product')) {
        $products[] = $p;
    }

    return $products;
}


function fetchProductsByCategory($pdo, $category) {

    $sql = "SELECT * FROM Products WHERE Category = :category";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':category', $category);

    $statement->execute();

    $products = [];

    while ($p = $statement->fetchObject('Product')) {
        $products[] = $p;
    }

    return $products;
}


function fetchAdmins($pdo) {
    $sql = "SELECT * FROM admin";
    $result = $pdo->query($sql);

    $admins = [];

    while ($d = $result->fetchObject('Admin')) {
        $admins[] = $d;
    }

    return $admins;
}

function findAdminByEmail($pdo, $usrEmail){

    $sql = "SELECT * FROM Admin WHERE Email = :email";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':email', $usrEmail);

    $statement->execute();

    return $statement->fetchObject('Admin');
}
function getUserOrders()
{
    return $_SESSION['orders'] ?? [];
}