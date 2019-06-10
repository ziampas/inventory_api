<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/db_functions.php");
require("includes/functions.php");

// Skapar databaskopplingen
$conn = dbConnect();

if(isset($_POST['productName'])){
    $name = $_POST['productName'];
}else{
    echo "Ingen tillåten post (productName)";
    exit;
}
if(isset($_POST['productQuantity'])){
    $quantity = $_POST['productQuantity'];
}else{
    echo "Ingen tillåten post (productQuantity)";
    exit;
}
if(isset($_POST['productPrice'])){
    $price = $_POST['productPrice'];
}else{
    echo "Ingen tillåten post (productPrice)";
    exit;
}
if(isset($_POST['productCategory'])){
    $category = $_POST['productCategory'];
}else{
    echo "Ingen tillåten post (productCategory)";
    exit;
}

$saveProduct = saveProduct($conn);

if(isset($saveProduct) && $saveProduct > 1 ) {
    $productData = getProductInfo($conn, $saveProduct);

    $output = $productData;

    echo json_encode($output);
}


// Stänger databaskopplingen
dbDisconnect($conn);
?>
