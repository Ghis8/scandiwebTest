<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin-Methods: * ");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept, Authorization");

include_once '../controller/products.php';



$prod=new Product();

// Fetching data in the database
$query="select * from product_list".($id ? "where id=$id":'');
$result=$prod->getData($query);


// Insert data into the database
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_GET['id'];
    $sku=$_POST['sku'];
    $prodName=$_POST['prodName'];
    $price=$_POST['price'];
    $switcher=$_POST['switcher'];
    $size=$_POST['size'];
    $length=$_POST['length'];
    $height=$_POST['height'];
    $width=$_POST['width'];
    $weight=$_POST['weight'];

    //Delete Products
    if(isset($_GET['delete'])){
        $delete=$_GET['delete'];
        $result=$prod->delete($delete,'product_list');
    }

    //Insert product
    $sql="INSERT INTO product_list(sku,price,switcher,size,height,width,names,lengths,weights)
        VALUES('$sku','$price','$switcher','$size','$height','$width','$prodName','$length','$weight')";

    $result=$prod->execute($sql);
}




