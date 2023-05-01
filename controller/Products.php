<?php


include_once '../model/dbConfig.php';

class Prod extends DbConfig{
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
    function manipulateData(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['switcher'] == 'DVD' || isset($_GET['delete'])){
                $DVD=new DVD();
                $DVD->manageData('DVD');
            }
            elseif($_POST['switcher']== 'Book' || isset($_GET['delete'])){
                $Book=new Book();
                $Book->manageData('Book');
            }
            elseif($_POST['switcher']== 'Furniture' || isset($_GET['delete'])){
                $Furniture=new Furniture();
                $Furniture->manageData('Furniture');
            }
            else{
                echo '<script>alert("Switcher not selected!")</script>';
            }
        }
    }
}