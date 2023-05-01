<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Origin-Methods: * ");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept, Authorization");

include '../controller/Products.php';
include '../controller/Book.php';
include '../controller/Furniture.php';
include '../controller/DVD.php';
include '../controller/products.php';



// Create Instances
$product=new Prod();

// adding and delete Data
$product->manipulateData();

// Fetching data in the database
$result=$product->getData($query);









