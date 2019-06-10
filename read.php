<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/db_functions.php");
require("includes/functions.php");

// Skapar databaskopplingen
$conn = dbConnect();

if(isset($_GET['productId']) && $_GET['productId'] > 0 ){
    $productData = getProductInfo($conn,$_GET['productId']);
}else{
    echo "Inget giltligt ID";
}

$output = $productData;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($conn);
?>
