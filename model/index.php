<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Origin-Methods: * ");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept, Authorization");

include_once '../controller/products.php';



$prod=new Product();

// Fetching data in the database
$result=$prod->getData($query);


// Insert data into the database && delete Data
$prod->manageData();




