<?php

include_once '../model/dbConfig.php';


//calling The Form
include_once 'Form.php';


// DVD Form
class DVD  extends DbConfig implements Product{
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
            $size=$_POST['size'];

            //Delete Products
            if(isset($_GET['delete'])){
                $delete=$_GET['delete'];
                $result=$this->delete($delete,'product_list');
            }
        
            //Insert product
            $sql="INSERT INTO product_list(sku,price,switcher,size,names)
                VALUES('$sku','$price','$switcher','$size','$prodName')";
        
            $result=$this->execute($sql);
        }
    }
    
}



