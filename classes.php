<?php 
class Location{
    public $street;
    public $desc;
}

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

class Cart{
    public $products;
}

class Admin{

	public $adminID ;
	public $Password ;
	public $Phone ;
	public $Email ;
	public $FName ;
	public $LName ;
}
class Payment{
    public $cardName;
    public $cardNum;
    public $expiryDate;
    public $cvv;
}

class Customer {
    public $name;
    public $email;
    public $tel;
    public $gender;
    public $age;
    public $city;
    public Cart $cart;
    public Location $location;

}
?>