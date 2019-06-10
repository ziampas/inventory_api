<?php

/*Lägg till produkt */

function saveProduct($conn){
    $name = $_POST['productName'];
    $quantity = $_POST['productQuantity'];
    $price = $_POST['productPrice'];
    $category = $_POST['productCategory'];
    $query = "INSERT INTO inventory
			(productName,productQuantity,productPrice,productCategory)
			VALUES('$name','$quantity','$price', $category)";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*HÄMTAR ALLA PRODUKTER */

function getAllProducts($conn){
    $query = "SELECT * FROM category INNER JOIN inventory ON category.categoryId = inventory.productCategory
    ORDER BY productName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

/*Hämtar kategorier */

function getAllCategories($conn){
    $query = "SELECT * FROM category ORDER BY categoryName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
  }

/* HÄMTAR PRODUKT */

function getProductInfo($conn,$customerId){
    $query = "SELECT * FROM inventory
			WHERE productId=".$customerId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

?>
