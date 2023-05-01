<?php

include_once '../model/dbConfig.php';

//calling The Form
include_once 'Form.php';


// Book Form
class Book  extends DbConfig implements Product{
    public function __construct(){
        parent::__construct();
    }
    public function manageData($sw){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_GET['id'];
            $sku=$_POST['sku'];
            $prodName=$_POST['prodName'];
            $price=$_POST['price'];
            $switcher=$sw;
            // $weight=$_POST['weight'];
        
            //Delete Products
            if(isset($_GET['delete'])){
                $delete=$_GET['delete'];
                $result=$this->delete($delete,'product_list');
            }
        
            //Insert product
            if(isset($sw)){
                $weight=$_POST['weight'];
            }
            $sql="INSERT INTO product_list(sku,price,switcher,names,weights)
                VALUES('$sku','$price','$switcher','$prodName','$weight')";
        
            $result=$this->execute($sql);
        }
    }
    
}


