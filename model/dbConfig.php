<?php
abstract class DbConfig 
{   
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'product';
    
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }           
        }   
        
        return $this->connection;
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
?>