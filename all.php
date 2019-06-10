<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/db_functions.php");
require("includes/functions.php");

// Skapar databaskopplingen
$conn = dbConnect();

// Visar alla kunder
$allProducts = getAllProducts($conn);

$output = $allProducts;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($conn);
?>
