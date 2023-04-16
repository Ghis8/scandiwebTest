<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Origin-Methods: * ");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept, Authorization");

include_once '../controller/GetData.php';
include_once '../controller/Book.php';
include_once '../controller/Furniture.php';
include_once '../controller/DVD.php';



// Create Instances
$product=new Prod();
$DVD=new DVD();
$Book=new Book();
$Furniture=new Furniture();



// Insert data into the database && delete Data
$DVD->manageData('DVD');
$Book->manageData('Book');
$Furniture->manageData('Furniture');


// Fetching data in the database
$result=$product->getData($query);









