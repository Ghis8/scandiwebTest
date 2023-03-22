<?php

include_once '../model/dbConfig.php';
interface Prod{
    public function getData($query);
    public function execute($query);
    public function delete($id,$table);
}

class Product  extends DbConfig implements Prod{
    public function __construct(){
        parent::__construct();
    }

    public function getData($query){
        $id='';
        $query="select * from product_list".($id ? "where id=$id":'');
        $result=$this->connection->query($query);
        $method=$_SERVER['REQUEST_METHOD'];
        if($result == false){
            return false;
        }else{
            if($_SERVER['REQUEST_METHOD']== 'GET'){
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                }
                echo '[';
                for($id=0;$id < mysqli_num_rows($result);$id++){
                    echo ($id > 0 ? ',': '').json_encode(mysqli_fetch_object($result));
                }
                echo ']';
            }
            
            else{
                echo 'Error occured!';
            }
        }
    }

    public function manageData(){
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
    }
    public function execute($query){
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }  
    }

    public function delete($id,$table){

        $query = "DELETE FROM $table WHERE id = $id";
        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }
}

